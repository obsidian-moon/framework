<?php
/** Create routes for the application */

use ObsidianMoon\Framework\Controllers\LandingController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

/** Landing page with an example of the code needed */
$routes->add('landing_index', new Route(
    path: '/',
    defaults: ['_controller' => [LandingController::class, 'index']],
    methods: ['GET', 'HEAD'],
));

return $routes;
