<?php

class FortyAll implements HumanReadableScore {
    public function value() {
        return "Forty-All";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
