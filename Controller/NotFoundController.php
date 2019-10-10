<?php

namespace Controller;

require_once __DIR__ . '/../Controller/LayoutController.php';

/**
 * Class NotFoundController
 * @package Controller
 */
class NotFoundController extends LayoutController
{
    /**
     * @return mixed|void
     * @throws \View\Exceptions\ViewException
     */
    public function viewAction()
    {
        // change http status code response to '404 not found'
        http_response_code(404);

        $params = [ 'sidebar' => false ];

        $this->render('404', $params);
    }
}