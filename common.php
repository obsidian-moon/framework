<?php
/**
 * Common file containing Core instantiation
 *
 * This file is where you will start the Core object and pass it to the rest of the
 * files in your application. This location is required by framework.
 *
 * Obsidian Moon Engine by Dark Prospect Games
 * An Open Source, Lightweight and 100% Modular Framework in PHP
 *
 * PHP version 7
 *
 * @category  Framework
 * @package   DarkProspectGames\ObsidianMoonEngine
 */
require __DIR__ . '/config/environment.php';
session_start();
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use ObsidianMoon\Engine\Exceptions\FileNotFoundException;
use ObsidianMoon\Engine\Handlers\ControllerHandler;
use ObsidianMoon\Engine\Handlers\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$exceptions = new ExceptionHandler(admin: false);

# Load up the .env file
$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

# Set the root directory
const APP_ROOT = __DIR__;
const VIEWS_ROOT = __DIR__ . '/src/views';
const PUBLIC_ROOT = __DIR__ . '/public';

$request = Request::createFromGlobals();

$routes = include APP_ROOT . '/config/routes.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

/** Handle all the routes through the Controller Handler once we found out which one is being used. */
try {
    $controller = new ControllerHandler($matcher->match($request->getPathInfo()));
    $response = $controller->render();
} catch (FileNotFoundException|ResourceNotFoundException|MethodNotAllowedException $exception) {
    $response = new Response($exceptions->handle($exception, 'Not Found'), 404);
} catch (Exception $exception) {
    $response = new Response($exceptions->handle($exception, 'An error occurred'), 500);
}

$response->send();
