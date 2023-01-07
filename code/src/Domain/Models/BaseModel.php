<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Base Model
 * This is the base model for all models in the application. It extends the Eloquent
 * Model class and adds shared functionality.
 */
class BaseModel extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
