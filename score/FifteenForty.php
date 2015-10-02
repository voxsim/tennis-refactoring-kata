<?php

class FifteenForty implements HumanReadableScore {
    public function value() {
        return "Fifteen-Forty";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
