<?php
/**
 * Created by PhpStorm.
 * User: reishou
 * Date: 1/22/18
 * Time: 3:58 PM
 */

namespace Infrastructure\Exceptions;

use Exception;
use Infrastructure\Traits\ResponseTrait;

class BaseException extends Exception
{
    use ResponseTrait;

    protected $code = 500;

    protected $message = 'SERVER_ERROR';
}
