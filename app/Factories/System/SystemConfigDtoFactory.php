<?php

namespace App\Factories\System;

use App\Dto\System\SystemConfigDto;
use App\Models\System\SystemConfig;

class SystemConfigDtoFactory
{
    /**
     * @param SystemConfig|null $config
     * @return SystemConfigDto|null
     */
    public function fromModel(?SystemConfig $config = null): ?SystemConfigDto
    {
        if (empty($config)) {
            return null;
        }

        $dto = new SystemConfigDto();
        $dto->setId($config->id);
        $dto->setKey($config->key);
        $dto->setValue($config->value);
        $dto->setCreatedAt($config->created_at);
        $dto->setUpdatedAt($config->updated_at);

        return $dto;
    }
}
