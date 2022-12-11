<?php declare(strict_types=1);

use AdventOfCode\Controllers\DayController;
use Slim\Psr7\{
    Response,
    Request
};
use Slim\App;

return function (App $app) {
    $app->get('/{id:[1-9][0-9]*}', function (Request $req, Response $res, $args) {
        $url = sprintf('/%d/%d', date('Y'), $args['id']);
        return $res->withHeader('Location', $url)->withStatus(301);
    });

    $app->get('/{year}/{id:[1-9][0-9]*}', DayController::class . ':index');
};
