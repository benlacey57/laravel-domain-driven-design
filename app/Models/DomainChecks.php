<?php

namespace App\Models;

use App\Enums\DomainCheckResultEnum;
use HHF\AuditLogging\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DomainChecks extends BaseModel
{
    use HasFactory;
    use AuditableTrait;

    protected $table = 'domain_checks';

    /**
     * The model or entity to link this to.
     *
     * @var string
     */
    protected $auditLogRelatedEntity = 'Proposals';

    /**
     * The key to assign this relationship to.
     *
     * @var string
     */
    protected $auditLogRelationField = 'proposal_id';

    protected $fillable = [
        'domain',
        'proposal_id',
        'creation_date',
        'expiry_date',
        'registrar',
        'result',
        'failure_reason',
        'result_override',
        'override_by_user_id',
    ];

    /**
     * Supplier relationship
     *
     * @return BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(EloquentProposalSupplier::class, 'domain_checks_id', 'id');
    }

    /**
     * Proposal relationship
     *
     * @return BelongsTo
     */
    public function proposal(): BelongsTo
    {
        return $this->belongsTo(EloquentOrganisation::class, 'domain_check_id', 'id');
    }

    /**
     * Contact relationship
     *
     * @return BelongsTo
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(OrganisationContact::class, 'domain_check_id', 'id');
    }

    /**
     * Individual relationship
     *
     * @return BelongsTo
     */
    public function individual(): BelongsTo
    {
        return $this->belongsTo(EloquentProposalIndividual::class, 'domain_check_id', 'id');
    }

    /**
     * Get the result if overridden or not
     * Default return is failed as a result hasn't been found
     *
     * @return integer
     */
    public function getOverallResultAttribute(): int
    {
        return empty($this->result_override) ? $this->result ?? DomainCheckResultEnum::FAILED : $this->result_override;
    }
}
