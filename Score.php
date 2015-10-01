<?php

class Score {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function get() {
        return $this->value;
    }

    public function increment() {
        $this->value++;
    }

    public static function create() {
        return new Score(0);
    }
}
