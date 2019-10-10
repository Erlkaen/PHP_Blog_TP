<?php

namespace Model\Exceptions;

/**
 * Class ArticleNotFoundException
 * @package Model\Exceptions
 */
class ArticleNotFoundException extends \Exception
{
    /**
     * ArticleNotFoundException constructor.
     * 
     * @param string $id
     */
    public function __construct($id)
    {
        $message = "Article not found (id: $id)";

        parent::__construct($message);
    }
}