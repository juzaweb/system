<?php
/**
 * @package    tadcms\tadcms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/tadcms/tadcms
 * @license    MIT
 *
 * Created by The Anh.
 * Date: 5/2/2021
 * Time: 10:02 PM
 */

namespace Tadcms\System\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Tadcms\System\Repositories\PostRepository',
            'Tadcms\System\Repositories\PostRepositoryEloquent'
        );

        $this->app->bind(
            'Tadcms\System\Repositories\TaxonomyRepository',
            'Tadcms\System\Repositories\TaxonomyRepositoryEloquent'
        );
    }
}
