<?php

class LoveThirty implements HumanReadableScore {
    public function value() {
        return "Love-Thirty";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
