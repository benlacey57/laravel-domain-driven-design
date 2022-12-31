<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class DomainCheckResultEnum extends Enum
{
    public const PASSED = 1;
    public const REFERRED = 2;
    public const FAILED = 3;
    public const SKIPPED = 4;

    /**
     * Mock domain strings
     */
    public const MOCK_DOMAIN_LESS_THAN_6_MONTHS = 'domainlessthansixmonths.mock';
    public const MOCK_DOMAIN_MORE_THAN_6_MONTHS = 'domainmorethansixmonths.mock';
    public const MOCK_DOMAIN_FAIL = 'domainfail.mock';
}
