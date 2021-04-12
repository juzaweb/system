<?php

namespace Tadcms\System\Traits;

trait UserModifyAble
{
    public static function bootUserModify()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $user_id = \Auth::id();
                if ($event=='creating') {
                    $model->created_by = $user_id;
                    $model->updated_by = $user_id;
                }
                elseif ($event=='updating') {
                    $model->updated_by = $user_id;
                }
            });
        }
    }
    
    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recodrdEvents;
        }
        
        return ['creating', 'updating'];
    }
}