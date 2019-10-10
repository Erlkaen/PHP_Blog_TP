<?php

namespace Model\Interfaces;

/**
 * Interface ItemInterface
 * @package Model\Interfaces
 */
interface ItemInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public static function getById($id);

    /**
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public static function getAll($offset = null, $limit = null);
}