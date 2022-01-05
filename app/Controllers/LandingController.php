<?php

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
