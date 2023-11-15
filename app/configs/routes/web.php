<?php

declare(strict_types=1);

use Slim\App;
use App\Controllers\HomeController;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
};