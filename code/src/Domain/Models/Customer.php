<?php

namespace Domain\Models;

use App\Models\BaseModel;

class Customer extends BaseModel
{
    protected $table = 'customers';

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // Model Relationships
}
