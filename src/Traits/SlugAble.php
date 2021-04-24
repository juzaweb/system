<?php

namespace Tadcms\System\Traits;

use Illuminate\Support\Str;

trait SlugAble
{
    public static function bootSlugAble()
    {
        static::saving(function ($model) {
            $model->slug = $model->generateSlug($model->{$model->slugSource});
        });
    }
    
    protected function generateSlug($string)
    {
        $slug = request()->input('slug');
        if ($slug) {
            return $slug;
        } else {
            $slug = substr($string, 0, 70);
            $slug = Str::slug($slug);
        }

        $count = self::where('id', '!=', $this->id)
            ->whereHas('translations', function ($q) use ($slug) {
                $q->where('slug', 'like', $slug . '%');
            })
            ->count();
    
        if ($count > 0) {
            $slug .= '-'. ($count + 1);
        }
        
        return $slug;
    }
}
