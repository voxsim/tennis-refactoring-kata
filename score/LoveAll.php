<?php

class LoveAll implements HumanReadableScore {
    public function value() {
        return "Love-All";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
