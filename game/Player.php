<?php

class Player {
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
        return new Player(0);
    }
}
