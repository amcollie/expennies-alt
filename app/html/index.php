<?php

declare(strict_types = 1);

$app = require dirname(__DIR__) . '/configs/bootstrap.php';

(require CONFIG_PATH . '/routes/web.php')($app);


$app->run();