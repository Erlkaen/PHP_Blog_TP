<?php

namespace Model\Manager;

use Framework\Configuration;

require_once __DIR__ . '/../../Framework/Configuration.php';

/**
 * Database connection manager
 *
 * Class DbManager
 * @package Model\Manager
 */
abstract class DbManager
{
    /** @var \PDO */
    private static $db;

    /**
     * Initialize database connection and return it
     *
     * @return \PDO
     * @throws \Exception
     */
    public static function getDb()
    {
        // Get database info from configuration
        $host = Configuration::getParameter('database', 'host');
        $name = Configuration::getParameter('database', 'name');
        $user = Configuration::getParameter('database', 'user');
        $password = Configuration::getParameter('database', 'password');
        $charset = Configuration::getParameter('database', 'charset');

        // Connecting to the database if it's not done yet
        if (is_null(self::$db)) {
            $pdo = new \PDO("mysql:host=$host;dbname=$name;charset=$charset", $user, $password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::setDb($pdo);
        }

        return self::$db;
    }

    /**
     * Set database connection
     *
     * @param \PDO $db
     */
    private static function setDb($db)
    {
        self::$db = $db;
    }
}