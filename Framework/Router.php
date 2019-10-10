<?php

namespace Framework;

use Controller\Controller;
use Controller\ErrorController;
use View\Exceptions\ViewException;

require_once __DIR__ . '/../Controller/ErrorController.php';
require_once __DIR__ . '/../Controller/NotFoundController.php';
require_once __DIR__ . '/../Controller/HomeController.php';
require_once __DIR__ . '/../Controller/ArticleController.php';

/**
 * Class Router
 * @package Framework
 */
class Router
{
    const DEFAULT_CONTROLLER_ID = 'home';
    const NOT_FOUND_CONTROLLER_ID = 'notFound';

    /**
     * @param $page
     * @return string
     */
    private static function controllerNamespace($page)
    {
        return 'Controller\\' . ucfirst($page) . 'Controller';
    }

    /**
     * @param $controllerId
     * @return mixed
     */
    private static function controllerName($controllerId)
    {
        if (!class_exists(self::controllerNamespace($controllerId))) {
            $controllerId = self::NOT_FOUND_CONTROLLER_ID;
        }

        return self::controllerNamespace($controllerId);
    }

    /**
     * routeRequest
     *
     * @throws ViewException
     */
    public static function routeRequest()
    {
        // get query parameter for routing
        $page = (isset($_GET['page']) && !empty($_GET['page']))
            ? $_GET['page']
            : self::DEFAULT_CONTROLLER_ID;

        try {
            // dynamic controller instance
            /** @var Controller $controller */
            $controllerName = self::controllerName($page);
            $controller = new $controllerName();

            // run controller's action
            $controller->viewAction();

        } catch (\Exception $ex) {
            // run error Controller when an exception has been catch
            $errorController = new ErrorController($ex->getMessage());
            $errorController->viewAction();
        }
    }
}