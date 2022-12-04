<?php declare(strict_types=1);

use AdventOfCode\Controllers\DayController;
use Slim\Psr7\{
    Response,
    Request
};
use Slim\App;

return function (App $app) {
    $app->get('/{year}/{id:[1-9][0-9]*}', DayController::class . ':index');
};
