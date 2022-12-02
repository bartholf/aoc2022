<?php declare(strict_types=1);

use Slim\Psr7\{
    Response,
    Request
};
use Slim\App;

return function (App $app) {
    $app->get('/day/{id:[1-9][0-9]*}', function (Request $request, Response $response, array $args) {
        $class = sprintf('\\AdventOfCode\\Controllers\\Day%dController', $args['id']);
        return (new $class)->index(...func_get_args());
    });
};
