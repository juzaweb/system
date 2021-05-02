<?php

namespace Tadcms\System\Repositories;

use Illuminate\Support\Arr;
use Tadcms\System\Models\Post;
use Tadcms\Repository\Eloquent\BaseRepository;
use Tadcms\System\Models\Taxonomy;

class PostRepository extends BaseRepository
{
    public function model()
    {
        return Post::class;
    }
    
    public function getConfig($postType)
    {
        $types = apply_filters('post_types', []);
        return collect(Arr::get($types, $postType, []));
    }
    
    public function create(array $attributes)
    {
        $model = parent::create($attributes);
        $taxonomies = $attributes['taxonomies'] ?? [];
        $model->taxonomies()->sync($this->combinePivot($taxonomies, [
            'term_type' => $model->type
        ]));

        foreach ($taxonomies as $taxonomy) {
            $taxonomy = Taxonomy::find($taxonomy);
            $taxonomy->update([
                'total_post' => $taxonomy->posts()->count(),
            ]);
        }
    }
    
    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);
        $taxonomies = $attributes['taxonomies'] ?? [];
        $model->taxonomies()->sync($this->combinePivot($taxonomies, [
            'term_type' => $model->type
        ]));

        foreach ($taxonomies as $taxonomy) {
            $taxonomy = Taxonomy::find($taxonomy);
            $taxonomy->update([
                'total_post' => $taxonomy->posts()->count(),
            ]);
        }
    }

    /**
     * @param $repository
     * @param \Tadcms\System\Models\Post $model
     */
    public function entityDeleting($repository, $model)
    {
        $model->taxonomies()->detach();
    }
}
