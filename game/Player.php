<?php

class Player {
    private $name;
    private $score;

    public function __construct($name, $score) {
        $this->score = $score;
        $this->name = $name;
    }

    public function name() {
        return $this->name;
    }

    public function score() {
        return $this->score;
    }

    public function winPoint() {
        $this->score++;
    }

    public static function create($name) {
        return new Player($name, 0);
    }
}
