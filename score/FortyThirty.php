<?php

class FortyThirty implements HumanReadableScore {
    public function value() {
        return "Forty-Thirty";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
