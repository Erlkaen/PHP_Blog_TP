<?php

namespace Controller;

use View\View;

require_once __DIR__ . '/../View/View.php';
require_once __DIR__ . '/../Controller/Controller.php';

/**
 * Class LayoutController
 * @package Controller
 */
class LayoutController extends Controller
{
    /**
     * @param $childViewName
     * @param array $childParams
     * @throws \View\Exceptions\ViewException
     */
    public function render($childViewName, $childParams = array())
    {
        // layout params
        $params = [
            'content' => View::renderTemplate($childViewName, $childParams),
            'sidebar' => $childParams['sidebar'] ?? true
        ];

        // render layout view with child and layout params
        View::render('layout', array_merge($params, $childParams));
    }

    /**
     * Layout view action
     */
    public function viewAction()
    {
        // Nothing to do
    }
}