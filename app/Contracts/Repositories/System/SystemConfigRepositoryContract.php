<?php

namespace App\Contracts\Repositories\System;

use App\Dto\System\SystemConfigDto;
use Illuminate\Support\Collection;

interface SystemConfigRepositoryContract
{
    public function getAll(): Collection;

    public function getByKey(string $key): ?SystemConfigDto;

    public function store(SystemConfigDto $systemConfigDto): SystemConfigDto;

    public function update(SystemConfigDto $systemConfigDto): SystemConfigDto;
}
