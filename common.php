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
require dirname(__DIR__) . '/vendor/autoload.php';

use \DarkProspectGames\ObsidianMoonEngine\Core;
use \DarkProspectGames\ObsidianMoonEngine\Modules\Input as CoreInput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

try {
    $core = new Core(
        [
            'modules' => [
                'input' => new CoreInput()
            ]
        ]
    );
    $logger = new Logger('App');
    $logger->pushHandler(
        new StreamHandler($core->config('root') . '/logs/errors.log', Logger::DEBUG)
    );
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}
