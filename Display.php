<?php

class Display {
    private $humanReadableScore;

    public function __construct($humanReadableScore) {
        $this->humanReadableScore = $humanReadableScore;
    }

    public function show() {
        return $this->humanReadableScore->value();
    }

    public function player1WonPoint() {
        $this->humanReadableScore = $this->humanReadableScore->player1WonPoint();
    }

    public function player2WonPoint() {
        $this->humanReadableScore = $this->humanReadableScore->player2WonPoint();
    }

    static public function create() {
        return new Display(new LoveAll());
    }
}
