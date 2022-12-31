<?php

namespace Database\Seeders;

use App\Models\System\SystemConfig;
use Illuminate\Database\Seeder;

class SystemConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->getConfigs() as $config) {
            SystemConfig::updateOrCreate(['key' => $config['key']], $config);
        }
    }

    /**
     * @return array[]
     */
    private function getConfigs(): array
    {
        return [
            [
                'key' => 'configurations.event_actions.queue_active',
                'value' => null,
            ],
            [
                'key' => 'configurations.event_actions.future_activities_sub_days',
                'value' => null,
            ],
            [
                'key' => 'telescope_filter',
                'value' => null,
            ],
            [
                'key' => 'telescope_sensitive_details',
                'value' => null,
            ],
            [
                'key' => 'experian.password',
                'value' => null,
            ],
            [
                'key' => 'propel.asset_inspections_required_totals.direct_direct_model_broker_proposal_type_total',
                'value' => null,
            ],
            [
                'key' => 'propel.asset_inspections_required_totals.sale_leaseback_hp_back_refinance_total',
                'value' => null,
            ],
            [
                'key' => 'propel.asset_inspections_required_totals.all_proposal_types_total',
                'value' => null,
            ],
        ];
    }
}
