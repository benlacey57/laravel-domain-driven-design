<?php

namespace App\Traits;

use Carbon\Carbon;
use Chelout\RelationshipEvents\Concerns\HasBelongsToManyEvents;
use Chelout\RelationshipEvents\Concerns\HasManyEvents;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

/**
 * A trait to log any create, update or delete event on the eloquent model
 *
 * @author Jason King <jking@hhf.uk.com>
 * @copyright Henry Howard Finance Group
 */
trait AuditableTrait
{
    use HasBelongsToManyEvents;
    use HasManyEvents;

    /**
     * Fields to ignore when auditing the model.
     * This can be overwritten by the model utilising this trait.
     */
    protected $auditIgnoreFields = [
        'updated_at',
        'created_at',
        'slug',
        'password'
    ];

    /**
     * Override the eloquent boot method so we can hook our own code into it.
     */
    public static function boot()
    {
        //Call default boot
        parent::boot();

        //Boot audit logging
        static::bootAuditLogging();
    }

    /**
     * Boot the audit loggin functionality
     *
     * @return void
     */
    public static function bootAuditLogging()
    {
        static::saving(function ($model){
            // Execute before saving
        });
        static::saved(function ($model){
            $model->postSave();
        });
        static::created(function ($model){
            $model->postCreate();
        });
        static::deleted(function ($model){
            $model->postDelete();
        });

        // static::hasManySaved(function ($parent, $related) {
        //     Log::debug("Logging has many {$parent->name}.");
        // });

        static::belongsToManySyncing(function ($relationName, $model, $new){
            //Get instance of audit loggin grepository
            $repo = app()->make('AuditLoggingRepository');

            if(is_object($model->$relationName()) && $model->$relationName()->first()){
                //Get table associated in the many to many relationship.
                $relationTable = DB::table($model->$relationName()->first()->getTable());

                //Get the name for the records of the ID's given, comma deliminate them into a string.
                $oldValues = implode(', ', $model->$relationName()->pluck('name')->toArray());
                $newValues = implode(', ', $relationTable->whereIn('id', $new)->pluck('name')->toArray());

                //If the values are different, store them in the audit logging repository
                if($oldValues != $newValues){
                    $data['id'] = $model->id;
                    $data['name'] = $model->getEntityName();
                    $data['type'] = static::class;
                    $data['field'] = 'Relationship: ' . $relationName;
                    $data['old'] = $oldValues;
                    $data['new'] = $newValues;
                    $data['session_id'] = session()->getId();
                    $data['source'] = 'database';
                    $data['event'] = 'updated';
                    $data['relation_id'] = null;
                    $data['relation_name'] = null;
                    $data['table'] = null;
                    $data['connection'] = null;
                    $data['user_id'] = request()->header('request-user');
                    $data['user_ip'] = request()->header('request-ip');

                    if(auth()->user()){
                        $data['user_id'] = auth()->user()->id;
                        $data['user_ip'] = request()->ip();
                    }

                    //Store record
                    $repo->store($data);
                }
            }
        });
    }

    /**
     * Get audits for the relative model
     *
     * @return void
     */
    public function getAudits()
    {
        $repo = app()->make('AuditLoggingRepository');
        return $repo->get(static::class, $this->id);
    }

    /**
     * Get paginated audits for the relative model
     *
     * @return void
     */
    public function getAuditsPaginated()
    {
        $repo = app()->make('AuditLoggingRepository');
        return $repo->usePagination()->get(static::class, $this->id);
    }

    /**
     * This is called after updating.
     *
     * @return void
     */
    protected function postSave()
    {
        //Get model
        $repo = app()->make('AuditLoggingRepository');

        //Get what keys need to be stored
        $fields = $this->getDiffKeys();

        //Store all changed records
        foreach($fields as $field){
            //Only store the audit if not explicity required not to (via ignored fields)
            if(!in_array($field, $this->auditIgnoreFields)){
                //Get it all ready to store
                $data['id'] = $this->id;
                $data['name'] = $this->getEntityName();
                $data['type'] = static::class;
                $data['field'] = $field;
                $data['old'] = isset($this->original[$field]) ? $this->original[$field] : '';
                $data['new'] = isset($this->attributes[$field]) ? $this->attributes[$field] : '';
                $data['session_id'] = session()->getId();
                $data['source'] = 'database';
                $data['event'] = 'updated';
                $data['user_id'] = request()->header('request-user');
                $data['user_ip'] = request()->header('request-ip');
                $data['relation_id'] = null;
                $data['relation_name'] = null;
                $data['table'] = $this->table ?? null;

                if(auth()->user()){
                    $data['user_id'] = auth()->user()->id;
                    $data['user_ip'] = request()->ip();
                }

                //Log against parent releationship manually
                if($this->auditLogRelatedEntity){
                    $data['relation_id'] = $this->{$this->auditLogRelationField};
                    $data['relation_name'] = $this->auditLogRelatedEntity;
                }

                //Store record
                $repo->store($data);
            }
        }
    }

    /**
     * This is called after creating.
     *
     * @return void
     */
    protected function postCreate()
    {
        //Get model
        $repo = app()->make('AuditLoggingRepository');

        //Get it all ready to store
        $data = [
            'id' => $this->id,
            'name' => $this->getEntityName(),
            'type' => static::class,
            'field' => self::CREATED_AT,
            'old' => null,
            'new' => $this->{self::CREATED_AT},
            'session_id' => session()->getId(),
            'source' => 'database',
            'event' => 'created',
            'user_id' => request()->header('request-user'),
            'user_ip' => request()->header('request-ip'),
            'relation_id' => null,
            'relation_name' => null,
            'table' => $this->table ?? null,
        ];

        if(auth()->user()){
            $data['user_id'] = auth()->user()->id;
            $data['user_ip'] = request()->ip();
        }

        //Log against parent releationship manually
        if($this->auditLogRelatedEntity){
            $data['relation_id'] = $this->{$this->auditLogRelationField};
            $data['relation_name'] = $this->auditLogRelatedEntity;
        }

        //Store record
        $repo->store($data);
    }

    /**
     * This is called after updating.
     *
     * @return void
     */
    protected function postDelete()
    {
        //Get model
        $repo = app()->make('AuditLoggingRepository');

        //Get it all ready to store
        $data = [
            'id' => $this->id,
            'name' => $this->getEntityName(),
            'type' => static::class,
            'field' => 'deleted_at',
            'old' => '',
            'new' => new \DateTime(),
            'session_id' => session()->getId(),
            'source' => 'database',
            'event' => 'deleted',
            'user_id' => request()->header('request-user'),
            'user_ip' => request()->header('request-ip'),
            'relation_id' => null,
            'relation_name' => null,
            'table' => $this->table ?? null
        ];

        if(auth()->user()){
            $data['user_id'] = auth()->user()->id;
            $data['user_ip'] = request()->ip();
        }

        //Log against parent releationship manually
        if($this->auditLogRelatedEntity){
            $data['relation_id'] = $this->{$this->auditLogRelationField};
            $data['relation_name'] = $this->auditLogRelatedEntity;
        }

        //Store record
        $repo->store($data);
    }

    /**
     * Get the array keys that have changed.
     *
     * @return array
     */
    protected function getDiffKeys()
    {
        $differences = [];

        foreach($this->original as $key => $value){
            if($this->original[$key] != $this->attributes[$key]){
                $differences[$key] = $value;
            }
        }

        if(empty($this->original)){
            $differences = $this->attributes;
            foreach($this->attributes as $key => $field){
                if(!$field || !is_string($field)){
                    unset($differences[$key]);
                }
            }
        }

        return array_keys($differences);
    }

    /**
     * Generate the friendly entity name
     *
     * @return string
     */
    protected function getEntityName()
    {
        if($this->entityName){
            return $this->entityName;
        }

        return ucwords(str_replace('_', ' ', $this->table));
    }
}
