<?php

namespace Tadcms\System\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Tadcms\System\Traits\ResponseMessage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ResponseMessage;
}