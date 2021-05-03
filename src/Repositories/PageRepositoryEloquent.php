<?php

namespace Tadcms\System\Repositories;

use Illuminate\Support\Arr;
use Tadcms\Repository\Eloquent\BaseRepository;
use Tadcms\System\Models\Page;
use Tadcms\System\Models\Taxonomy;
/**
 * Class PageRepositoryEloquent.
 *
 * @package namespace Tadcms\System\Repositories;
 */
class PageRepositoryEloquent extends BaseRepository implements PageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }

    /**
     * @param $repository
     * @param \Tadcms\System\Models\Page $model
     * @param array $attributes
     */
    public function entityCreated($repository, $model, $attributes)
    {
        $this->updateTaxonomies($attributes, $model);
    }

    /**
     * @param $repository
     * @param \Tadcms\System\Models\Page $model
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
     * @param \Tadcms\System\Models\Page $model
     */
    protected function updateTaxonomies(array $attributes, $model)
    {
        if (Arr::has($attributes, 'taxonomies')) {
            $taxonomies = (array) $attributes['taxonomies'];
            $model->taxonomies()->sync($this->combinePivot($taxonomies, [
                'term_type' => 'page'
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
