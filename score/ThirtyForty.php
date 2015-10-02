<?php

class ThirtyForty implements HumanReadableScore {
    public function value() {
        return "Thirty-Forty";
    }

    public function player1WonPoint() {
        return new FortyAll();
    }

    public function player2WonPoint() {
        return $this;
    }
}
