<?php

class ThirtyLove implements HumanReadableScore {
    public function value() {
        return "Thirty-Love";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
