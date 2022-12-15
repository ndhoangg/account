<?php
require_once __DIR__.'/../vendor/autoload.php';

use starter\core\Application;

$app = Application::getInstance();
include_once dirname(__DIR__).'/public/routes.php';

$app->run();
