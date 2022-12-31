<?php

namespace App\Dto\System;

use Carbon\Carbon;
use App\Traits\DtoToArrayTrait;

class SystemConfigDto
{
    use DtoToArrayTrait;

    private int $id;
    private ?string $key;
    private ?string $value;
    private Carbon $createdAt;
    private Carbon $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return SystemConfigDto
     */
    public function setId(int $id): SystemConfigDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     * @return SystemConfigDto
     */
    public function setKey(?string $key): SystemConfigDto
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return SystemConfigDto
     */
    public function setValue(?string $value): SystemConfigDto
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon $createdAt
     * @return SystemConfigDto
     */
    public function setCreatedAt(Carbon $createdAt): SystemConfigDto
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     * @return SystemConfigDto
     */
    public function setUpdatedAt(Carbon $updatedAt): SystemConfigDto
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
