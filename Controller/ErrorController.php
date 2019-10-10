<?php

namespace Controller;

require_once __DIR__ . '/../Controller/LayoutController.php';

/**
 * Class ErrorController
 * @package Controller
 */
class ErrorController extends LayoutController
{
    /**
     * @var mixed
     */
    private $errorMessage;

    /**
     * @param mixed $errorMessage
     */
    public function __construct($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return mixed|void
     * @throws \View\Exceptions\ViewException
     */
    public function viewAction()
    {
        // change http status code response to '500 internal server error'
        http_response_code(500);

        $params = [
            'message' => $this->errorMessage,
            'sidebar' => false
        ];

        $this->render('error', $params);
    }
}