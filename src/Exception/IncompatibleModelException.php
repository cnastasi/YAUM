<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Exception;

use Exception;

/**
 * Description of IncompatibleModel
 *
 * @author christian
 */
class IncompatibleModelException extends Exception
{
    public function __construct($expected, $model)
    {
        $message = sprintf('Incompatible Model: expected %s, found %s', $expected, get_class($model));
        
        parent::__construct($message);
    }
}
