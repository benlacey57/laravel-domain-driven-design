<?php

namespace App\Exceptions;

use Exception;

class UnixTimeStampConvertorException extends Exception
{
    protected $message;

    public function __construct(string $message)
    {
        parent::__construct();
        $this->message = $message;
    }
}
