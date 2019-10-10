<?php

namespace Controller;

use Model\Manager\ArticleManager;

require_once __DIR__ . '/../Controller/LayoutController.php';
require_once __DIR__ . '/../Model/Manager/ArticleManager.php';

/**
 * Class ArticleController
 * @package Controller
 */
class ArticleController extends LayoutController
{
    /**
     * Article View action
     *
     * @throws \Exception
     */
    public function viewAction()
    {
        $articleId = (isset($_GET['id']) && !empty($_GET['id']))
            ? (int) $_GET['id']
            : null;

        if (is_null($articleId)) {
            throw new \Exception('Article id is missing');
        }

        $params = [ 'article' => ArticleManager::getById($articleId) ];

        $this->render('article', $params);
    }
}