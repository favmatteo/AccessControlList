<?php

class confirmEmailException extends Exception {
    public function __construct(Throwable $previous = null) {
        parent::__construct("Confirm email before", 403, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return "{$this->message}\n";
    }
}