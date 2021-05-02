<?php

namespace Tadcms\System\Repositories;

use Illuminate\Support\Arr;
use Tadcms\Repository\Eloquent\BaseRepository;
use Tadcms\Repository\Criteria\RequestCriteria;
use Tadcms\System\Models\Post;
use Tadcms\System\Models\Taxonomy;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace Tadcms\System\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param $repository
     * @param \Tadcms\System\Models\Post $model
     * @param array $attributes
     */
    public function entityCreated($repository, $model, $attributes)
    {
        $this->updateTaxonomies($attributes, $model);
    }

    /**
     * @param $repository
     * @param \Tadcms\System\Models\Post $model
     * @param array $attributes
     */
    public function entityUpdated($repository, $model, $attributes)
    {
        $this->updateTaxonomies($attributes, $model);
    }

    /**
     * @param $repository
     * @param \Tadcms\System\Models\Post $model
     */
    public function entityDeleting($repository, $model)
    {
        $model->taxonomies()->detach();
    }

    /**
     * @param array $attributes
     * @param \Tadcms\System\Models\Post $model
     */
    protected function updateTaxonomies(array $attributes, $model)
    {
        if (Arr::has($attributes, 'taxonomies')) {
            $taxonomies = (array) $attributes['taxonomies'];
            $model->taxonomies()->sync($this->combinePivot($taxonomies, [
                'term_type' => $model->type
            ]));

            foreach ($taxonomies as $taxonomy) {
                $taxonomy = Taxonomy::find($taxonomy, ['id', 'total_post']);
                $taxonomy->update([
                    'total_post' => $taxonomy->posts()->count(),
                ]);
            }
        }
    }
}
