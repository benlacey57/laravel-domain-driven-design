<?php

namespace App\Models\System;

use Carbon\Carbon;
use App\Models\BaseModel;

/**
 * @property int $id
 * @property string $key
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class SystemConfig extends BaseModel
{
    protected $table = 'system_config';
}
