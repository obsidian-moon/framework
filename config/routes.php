<?php
/**
 * Obsidian Moon Framework
 *
 * This is an example of how I work on my application.
 * It is a work in progress, but it works.
 *
 * Obsidian Moon Engine by Obsidian Moon Development
 * An Open Source, Lightweight and 100% Modular Framework in PHP
 *
 * PHP version 8
 *
 * @category  Framework
 * @package   ObsidianMoon\Framework
 */

use ObsidianMoon\Framework\Controllers\LandingController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/** Start creating routes for the application by instantiating a Route Collection object. */
$routes = new RouteCollection();

/** Associate a route to the Controller method for the landing page for '/' */
$routes->add('landing_index', new Route(
    path: '/',
    defaults: ['_controller' => [LandingController::class, 'index']],
    methods: ['GET', 'HEAD'],
));

/** Return the route collection to be used by application */
return $routes;
