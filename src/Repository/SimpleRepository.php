<?php namespace YAUM\Repository;

use YAUM\Contract\Entity;

/**
 * Description of SimpleRepository
 *
 * @author christian
 */
class SimpleRepository
{

    /**
     *
     * @var Entity[]
     */
    private $map;

    /**
     *
     * @var Entity[]
     */
    private $mapById;

    /**
     * @var string[]
     */
    private $idToKeyMap;

    public function __construct()
    {
        $this->map        = array();
    }

    public function put(Entity $value)
    {
        $this->map[$value->getId()] = $value;
    }

    /**
     * @param $key
     * @return Entity|null
     */
    public function getById($id)
    {
        if (isset($this->map[$id])) {
            return $this->map[$id];
        }

        return null;
    }

    /**
     * @param mixed $id
     */
    public function getByCallback(callable $callback)
    {
        foreach ($this->map as $item) {
            $result = $callback($item);

            if ($result) {
                return $item;
            }
        }

        return null;
    }

    public function remove($id)
    {
        if (isset($this->map[$id])) {
            unset($this->map[$id]);
        }
    }
}
