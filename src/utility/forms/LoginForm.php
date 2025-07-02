<?php

class LoginForm {

    protected $errors = [];

    public function validate ($email, $password) {
        if (!Validator::email($email)) {
            $this->errors['email'] = "Please provide a valid email address.";
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = "Password must be a valid password.";
        }

        return empty($this->errors);
    }
    public function getErrors () {
        return $this->errors;
    }
    public function addError($field, $message) {
        $this->errors[$field] = $message;
    }
}