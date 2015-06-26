<?php namespace YAUM;

use YAUM;

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

    public function __construct()
    {
        $this->map = array();
    }

    public function put(Entity $value)
    {
        $this->map[$value->getId()] = $value;
    }

    /**
     * @param $id
     * @return Entity|null
     */
    public function getById($id)
    {
        if (array_key_exists($id, $this->map)) {
            return $this->map[$id];
        }

        return null;
    }

    /**
     * @param callable $callback
     * @return null|Entity
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
        if (array_key_exists($id, $this->map)) {
            unset($this->map[$id]);
        }
    }
}
