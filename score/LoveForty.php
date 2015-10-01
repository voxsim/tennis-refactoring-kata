<?php

class LoveForty implements HumanReadableScore {
    public function value() {
        return "Love-Forty";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
