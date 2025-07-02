<?php

use Utility\ValidationException;
class LoginForm
{

    protected $errors = [];

    public function __construct(public array $attributes)
    {
        // Initialize any necessary properties or dependencies here
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address.";
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = "Password must be a valid password.";
        }
    }
    public static function validate($attributes)
    {
        $instance = new static($attributes);

        //  if($instance->failed()) {
        //     // both of these lines are same, just different way to throw exception
        //     //  throw new ValidationException();
        //     // ValidationException::throw($instance->getErrors(),$instance->attributes);
        //  }

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function addError($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}