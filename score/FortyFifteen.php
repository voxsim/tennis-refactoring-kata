<?php

class FortyFifteen implements HumanReadableScore {
    public function value() {
        return "Forty-Fifteen";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
