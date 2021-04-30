<?php
/**
 * Web Routes
 *
 * @package    Tadcms\Tadcms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/tadcms/tadcms
 * @license    MIT
*/

use Tadcms\Backend\Routes as BackendRoutes;
use Tadcms\Frontend\Routes as FrontendRoutes;

$admin_prefix = config('tadcms.admin-prefix');

Route::group(['prefix' => $admin_prefix], function (){
    BackendRoutes::web();
});

Route::group(['prefix' => 'auth'], function (){
    BackendRoutes::auth();
});

FrontendRoutes::web();