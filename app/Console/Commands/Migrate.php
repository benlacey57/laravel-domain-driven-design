<?php

namespace Propel\Referrals\Console\Commands;

use App\Repositories\PartnerPortalUsers\EloquentPartnerPortalUser as PartnerPortalUser;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Collection;
use Propel\Referrals\app\Exceptions\ImportException;
use Propel\Referrals\Enums\AssetCondition;
use Symfony\Component\Console\Helper\ProgressBar;

class ReferralsMigrate extends Command
{
    /** @var ProgressBar */
    protected $bar;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'referrals:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrates the referrals from the old Partner Portal tables, to the new Workflow tables';

    /**
     * @var ConnectionInterface The database to retrieve data from
     */
    protected $originDb;

    /**
     * @var ConnectionInterface The database to send data to
     */
    protected $destinationDb;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->originDb = DB::connection('mysql_partner');
        $this->destinationDb = DB::connection();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     *
     * @throws \Throwable
     */
    public function handle()
    {
        $this->bar = $this->output->createProgressBar();
        $this->bar->start();

        $this->outputLine('Fetching old referral data', 'comment');

        // retrieve the original data and map it to the correct format
        $originReferrals = $this->getOriginReferrals();

        // map the data
        $mappedReferrals = $this->mapData($originReferrals);
        $count = count($mappedReferrals);

        $this->outputLine('Found ' . $count . ' rows. Importing into new database', 'comment');

        // import the data
        $this->importData($mappedReferrals);

        $this->bar->finish();

        $this->outputLine('Imported ' . $count . ' rows', 'comment');
    }

    /**
     * Returns all of the old referrals from the origin database.
     *
     * Referral clients and companies are mapped to each referral as
     * `$referral->client` and `$referral->company` respectively.
     *
     * @return Collection
     */
    public function getOriginReferrals(): Collection
    {
        $referrals = $this->originDb->table('referrals')->get();
        $clients = $this->originDb
            ->table('referral_clients')
            ->whereIn('id', $referrals->pluck('client_id')->toArray())
            ->get();
        $companies = $this->originDb
            ->table('referral_companies')
            ->whereIn('id', $referrals->pluck('company_id')->toArray())
            ->get();

        // loop through and match the referrals to their client and company
        return $referrals->map(
            function ($referral) use ($clients, $companies) {
                $referral->client = $clients->firstWhere('id', $referral->client_id);
                $referral->company = $companies->firstWhere('id', $referral->company_id);

                return $referral;
            }
        );
    }

    /**
     * Returns the user that made the referral
     *
     * @param  int  $id  The ID of the referrer
     *
     * @return PartnerPortalUser
     */
    protected function getReferrer(int $id): PartnerPortalUser
    {
        return PartnerPortalUser::findOrFail($id);
    }

    /**
     * Returns the ID of the first organisation that the user belongs to
     *
     * @param  int  $id
     *
     * @return string
     */
    protected function getReferrerFirstOrganisationId(int $id): string
    {
        $referrer = $this->getReferrer($id);

        return trim(explode(',', $referrer->organisations)[0]);
    }

    /**
     * imports the old data into the destination database
     *
     * @param  Collection  $data
     *
     * @throws \Throwable
     */
    protected function importData(Collection $data)
    {
        $this->bar->setMaxSteps(count($data));
        $this->bar = $this->output->createProgressBar();
        $this->bar->start();

        // transactions are nice. Love them.
        $this->destinationDb->transaction(
            function () use ($data) {
                // disable the foreign keys checks, otherwise importing fails
                $this->destinationDb->statement('SET FOREIGN_KEY_CHECKS = 0');

                // loop through each referral and insert it into the new database
                foreach ($this->bar->iterate($data) as $referral) {
                    // insert the client
                    $clientId = $this->destinationDb
                        ->table('referral_clients')
                        ->insertGetId((array)$referral->client);
                    unset($referral->client);

                    // insert the company
                    $companyId = $this->destinationDb
                        ->table('referral_companies')
                        ->insertGetId((array)$referral->company);
                    unset($referral->company);

                    // update the referral's client and company IDs
                    $referral->client_id = $clientId;
                    $referral->company_id = $companyId;

                    // insert the referral
                    $referralId = $this->destinationDb->table('referrals')->insertGetId((array)$referral);

                    $this->outputLine('Imported referral to ID ' . $referralId, 'info');
                }

                // re-enable foreign key checks
                $this->destinationDb->statement('SET FOREIGN_KEY_CHECKS = 1');
            }
        );
    }

    /**
     * Maps the old referral data to match the new table structure and required data
     *
     * @param  Collection  $data
     *
     * @return Collection
     */
    protected function mapData(Collection $data): Collection
    {
        // add / remove / modify properties and return them
        return $data->map(
            function ($referral) {
                // remove the skeleton record as it's no longer used
                unset($referral->skeleton_record);

                // remove the IDs as these will change during import
                unset($referral->id);
                unset($referral->client_id);
                unset($referral->company_id);
                unset($referral->client->id);
                unset($referral->company->id);

                // ensure the asset condition is defined
                if (!$referral->asset_condition) {
                    $referral->asset_condition = AssetCondition::NEW;
                }

                // remove any whitespace from the phone number
                $referral->client->phone = preg_replace('/\s+/', '', $referral->client->phone);

                // add the organisation ID
                $referral->organisation_id = $this->getReferrerFirstOrganisationId($referral->referrer_id);

                return $referral;
            }
        );
    }

    /**
     * Outputs a line to the console, ensuring that the progress bar displays correctly
     *
     * @param $message
     * @param  string  $type
     */
    protected function outputLine($message, string $type = 'line')
    {
        $validTypes = ['line', 'info', 'comment', 'question', 'error'];

        if (!in_array($type, $validTypes)) {
            $type = 'line';
        }

        optional($this->bar)->clear();
        $this->$type($message);
        optional($this->bar)->display();
    }
}
