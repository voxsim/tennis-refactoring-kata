<?php

class FortyLove implements HumanReadableScore {
    public function value() {
        return "Forty-Love";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}
