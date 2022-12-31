<?php

namespace App\Repositories\System;

use App\Contracts\Repositories\System\SystemConfigRepositoryContract;
use App\Dto\System\SystemConfigDto;
use App\Factories\System\SystemConfigDtoFactory;
use App\Models\System\SystemConfig;
use Illuminate\Support\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class EloquentSystemConfigRepository implements SystemConfigRepositoryContract
{
    private SystemConfig $model;
    private SystemConfigDtoFactory $factory;

    /**
     * EloquentSystemConfigRepository Constructor
     */
    public function __construct()
    {
        $this->model = app(SystemConfig::class);
        $this->factory = app(SystemConfigDtoFactory::class);
    }

    /**
     * @return Collection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getAll(): Collection
    {
        return $this->model->whereNotNull('value')->get()->map(function (SystemConfig $config) {
            return $this->factory->fromModel($config);
        });
    }

    /**
     * @param string $key
     * @return SystemConfigDto|null
     */
    public function getByKey(string $key): ?SystemConfigDto
    {
        return $this->factory->fromModel($this->model->firstWhere('key', $key));
    }

    /**
     * @param SystemConfigDto $systemConfigDto
     * @return SystemConfigDto
     */
    public function store(SystemConfigDto $systemConfigDto): SystemConfigDto
    {
        $newSystemConfig = new SystemConfig();
        $newSystemConfig->key = $systemConfigDto->getKey();
        $newSystemConfig->value = $systemConfigDto->getValue();
        $newSystemConfig->save();

        return $this->factory->fromModel($newSystemConfig);
    }

    /**
     * @param SystemConfigDto $systemConfigDto
     * @return SystemConfigDto
     */
    public function update(SystemConfigDto $systemConfigDto): SystemConfigDto
    {
        $systemConfig = $this->model->firstWhere('key', $systemConfigDto->getKey());

        if (!empty($systemConfig)) {
            $systemConfig->value = $systemConfigDto->getValue();
            $systemConfig->save();
        }

        return $this->factory->fromModel($systemConfig);
    }
}
