<?php

namespace View\Exceptions;

use View\View;

require_once __DIR__ . '/../../View/View.php';

/**
 * Class ViewException
 * @package View\Exceptions
 */
class ViewException extends \Exception
{
    public static function templateNotFound($template)
    {
        return new self(
            sprintf("Template '%s' not found into '%s'.", $template, View::TEMPLATE_FOLDER)
        );
    }
}