<?php

class FortyLove implements HumanReadableScore {
    public function value() {
        return "Forty-Love";
    }

    public function player1WonPoint() {
        return new FortyFifteen();
    }

    public function player2WonPoint() {
        return $this;
    }
}
