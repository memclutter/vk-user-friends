<?php

namespace app\modules\users\exceptions;

use yii\base\Exception;

class FriendsNotFoundException extends Exception
{
    public function __construct($message = 'Friends not found :(', $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}