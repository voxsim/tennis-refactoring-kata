<?php

class ThirtyAll implements HumanReadableScore {
    public function value() {
        return "Thirty-All";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
