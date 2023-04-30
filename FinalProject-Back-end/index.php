<?php
require_once "vendor/autoload.php";

use App\Core\Router;
use App\Core\Request;

require "core/bootstrap.php";

Router::load("routes.php")->direct(Request::uri(),Request::method());
