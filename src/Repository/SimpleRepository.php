<?php namespace SimpleUser\Repository;

/**
 * Description of SimpleRepository
 *
 * @author christian
 */
class SimpleRepository
{

    /**
     *
     * @var array 
     */
    private $map;

    public function __construct()
    {
        $this->map = array();
    }

    public function put($key, $value)
    {
        $this->map[$key] = $value;
    }

    public function get($key)
    {
        if (isset($this->map[$key])) {
            return $this->map[$key];
        }

        return null;
    }

    public function remove($key)
    {
        if (isset($this->map[$key])) {
            unset($this->map[$key]);
        }
    }
}
