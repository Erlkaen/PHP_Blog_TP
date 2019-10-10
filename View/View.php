<?php

namespace View;

use View\Exceptions\ViewException;

require_once __DIR__ . '/../View/Exceptions/ViewException.php';

/**
 * Class View
 */
class View
{
    const TEMPLATE_FOLDER = "View/templates/";
    const TEMPLATE_EXTENSION = ".html.php";

    /**
     * @param $view
     * @param $params
     * @throws ViewException
     */
    public static function render($view, $params)
    {
        // display page content
        echo self::renderTemplate($view, $params);
    }

    /**
     * Get content from template file
     *
     * @param $view
     * @param $params
     * @return string
     * @throws ViewException
     */
    public static function renderTemplate($view, $params)
    {
        // generate template variables
        extract($params);

        // start stream
        ob_start();

        $templateFile = self::TEMPLATE_FOLDER . $view . self::TEMPLATE_EXTENSION;

        // check if template exists
        if (!file_exists($templateFile)) {
            throw ViewException::templateNotFound($view);
        }

        // call template
        require_once $templateFile;

        // return stream
        return ob_get_clean();
    }
}