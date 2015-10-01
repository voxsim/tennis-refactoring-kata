<?php

class FifteenAll implements HumanReadableScore {
    public function value() {
        return "Fifteen-All";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
