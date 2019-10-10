<?php

namespace Controller;

use Model\Manager\ArticleManager;

require_once __DIR__ . '/../Controller/LayoutController.php';
require_once __DIR__ . '/../Model/Manager/ArticleManager.php';

/**
 * Class HomeController
 * @package Controller
 */
class HomeController extends LayoutController
{
    /**
     * Homepage View action
     *
     * @return mixed|void
     * @throws \Exception
     * @throws \View\Exceptions\ViewException
     */
    public function viewAction()
    {
        $params = [ 'articles' => ArticleManager::getAll() ];

        $this->render('home', $params);
    }
}