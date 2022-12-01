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
namespace ObsidianMoon\Framework\Controllers;

use JetBrains\PhpStorm\Pure;
use ObsidianMoon\Engine\Abstracts\AbstractController;
use ObsidianMoon\Engine\Exceptions\FileNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class LandingController extends AbstractController
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(VIEWS_ROOT);
    }

    /**
     * Landing Page, from route /
     *
     * @return Response
     * @throws FileNotFoundException
     */
    public function index(): Response
    {
        try {
            $content = $this->view->load(view: 'landing/index', return: true);
            return new Response(
                $this->view->load(view: 'layouts/shell', data: compact('content'), return: true)
            );
        } catch (FileNotFoundException $exception) {
            throw new FileNotFoundException($exception->getMessage());
        }
    }
}
