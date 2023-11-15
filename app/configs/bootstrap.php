<?php

declare(strict_types=1);

use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/configs/path_constants.php';

\Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

$container = require CONFIG_PATH . '/containers/container.php';
$addMiddlewares = require CONFIG_PATH . '/middleware.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

$addMiddlewares($app);

return $app;