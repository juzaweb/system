<?php
/**
 * Web Routes
 *
 * @package    tadcms\tadcms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/tadcms/tadcms
 * @license    MIT
*/

use Tadcms\Backend\Routes as BackendRoutes;
use Tadcms\Frontend\Routes as FrontendRoutes;

$adminPrefix = config('tadcms.admin-prefix');

Route::group(['prefix' => $adminPrefix], function () {
    BackendRoutes::web();
});

Route::group(['prefix' => 'auth'], function () {
    BackendRoutes::auth();
});

//FrontendRoutes::web();
