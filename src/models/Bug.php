<?php

class Bug extends Eloquent
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'bugs';

    /**
     * Primary key of users table
     * @var string
     */
    protected $primaryKey = 'bug_id';

    /**
     * Rules for project
     * @var array
     */
    public static $updateRules = array(
        'title' => 'required|max:200',
        'status' => 'numeric',
        'importance' => 'numeric',
        'description' => '',
    );

    /**
     * Rules for project
     * @var array
     */
    public static $rules = array(
        'title' => 'required|max:200',
        'status' => 'numeric',
        'importance' => 'numeric',
        'description' => '',
    );

    /**
     * Get rules for new or update
     * @param $update string|null
     * @param $id string|null
     * @return array
     */
    public static function getRules($update, $id)
    {
        if (is_null($update))
        {
            return static::$rules;
        }
        return static::$updateRules;
    }

    /**
     * Access to user assigned to a blueprint
     */
    public function userAssigned()
    {
        return $this->belongsTo('User', 'user_id_assigned', 'user_id');
    }

    /**
     * Access to user craeted a blueprint
     */
    public function userCreated()
    {
        return $this->belongsTo('User', 'user_id_created', 'user_id');
    }

    public function events()
    {
        return $this->hasMany('Events', 'bug_id', 'bug_id');
    }

    public function parent()
    {
        return $this->belongsTo('Blueprint', 'blueprint_id', 'blueprint_id');
    }
}
