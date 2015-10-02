<?php

class FifteenThirty implements HumanReadableScore {
    public function value() {
        return "Fifteen-Thirty";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return new FifteenForty();
    }
}
