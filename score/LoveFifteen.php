<?php

class LoveFifteen implements HumanReadableScore {
    public function value() {
        return "Love-Fifteen";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
