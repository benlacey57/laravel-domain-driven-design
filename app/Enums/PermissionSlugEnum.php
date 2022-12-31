<?php

namespace App\Enums;

final class PermissionSlugEnum
{
    public const ACCOUNT_MANAGER = 'account-manager';
    public const CREATE_USERS = 'create-propel-users';
    public const EDIT_USERS = 'edit-propel-users';
    public const LIST_REFERRALS = 'list-referrals';
    public const LIST_REFERRALS_VALIDATION = 'list-referrals-validation';
    public const VALIDATE_PRE_REFERRALS = 'validate-pre-referrals';
    public const CONVERT_REFERRALS = 'convert-referrals';
    public const UNDERWRITE_PROPOSALS = 'underwrite-proposals';
    public const UNDERWRITE_BROKER_PROPOSALS = 'underwrite-broker-proposals';
    public const OVERRIDE_PROPOSAL_ID_CHECKS = 'override-proposal-id-checks';
    public const CHANGE_FUNDER = 'change-funder';
    public const EDIT_DEALS = 'edit-deals';
    public const IMPORT_COMMISSION_SPLITS = 'import-commission-splits';
    public const PROPOSAL_HOWAPP_REKEY = 'proposal-howapp-rekey';
    public const DOCUMENT_COUNTER_SIGN = 'document-counter-sign';
    public const CREDIT_BATCH_ELIGIBILITY = 'credit-batch-eligibility';
    public const PREPARE_FUNDING_FILES = 'prepare-funding-files';
    public const GROUP_MAINTENANCE = 'group-maintenance';
    public const CREATE_EDIT_DOCUMENT_VALIDATION_SETS = 'create-edit-document-validation-sets';
    public const DEPOSIT_BY_DIRECT_DEBIT_CHECKBOX = 'deposit-by-driect-debit-checkbox';
    public const ADMINISTER_SYSTEM_CONFIG = 'administer-system-config';
    public const CREATE_EDIT_EVENT_AND_ACTION_SETS = 'create-edit-event-and-action-sets';
    public const BROKER_COST_OF_FUNDS = 'create-edit-broker-cost-of-funds';
    public const CREATE_EDIT_ORGANISATION_BANK_ACCOUNT_DETAILS = 'create-edit-organisation-bank-account-details';
    public const REOPEN_REFERRALS = 'reopen-referrals';
    public const AMEND_REFERRALS = 'amend-referrals';
    public const VIEW_PERSONAL_CREDIT_REPORTS_IN_FILES_SECTION = 'view-personal-credit-reports-in-files-section';
    public const OVERRIDE_WHOAMI_CHECKS = 'override-whoami-checks';
    public const APPROVE_SUPPLIER_COMPLIANCE = 'approve-override-supplier';
    public const UPDATE_SUPPLIER_STATUS_CREDIT = 'update-supplier-status-credit';
    public const UPDATE_SUPPLIER_STATUS_SALES_SUPPORT = 'update-supplier-status-sales-support';
    public const OVERRIDE_CREDIT_GRADE = 'override-credit-grade';
    public const OVERRIDE_GOV_ID_CHECK_FOR_SIGNING = 'override-gov-id-check-for-signing';
    public const UPDATE_VAT_REGISTRATION_NUMBER = 'update-vat-registration-number';
    public const UPDATE_INDICATIVE_APPROVAL_ON_REFERRAL = 'update-indicative-approval-on-referral';
}
