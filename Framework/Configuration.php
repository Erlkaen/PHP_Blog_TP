<?php

namespace Framework;

use Symfony\Component\Yaml\Yaml;

abstract class Configuration
{
    const blogIniPath = './config/config.yml';

    /** @var array */
    private static $parameters;

    /**
     * Load parameters from ini
     *
     * @return array
     */
    private static function getParameters()
    {
        // load parameters from ini file
        if (is_null(self::$parameters)) {
            self::$parameters = Yaml::parseFile(self::blogIniPath);
        }

        return self::$parameters;
    }

    /**
     * @param $section
     * @param $parameter
     * @return mixed
     * @throws \Exception
     */
    public static function getParameter($section, $parameter)
    {
        $parameters = self::getParameters();

        if (!isset($parameters[$section][$parameter])) {
            throw new \Exception("Parameter '$parameter' in section '$section' not found.");
        }

        return $parameters[$section][$parameter];
    }
}