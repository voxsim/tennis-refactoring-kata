<?php

class FifteenLove implements HumanReadableScore {
    public function value() {
        return "Fifteen-Love";
    }

    public function player1WonPoint() {
        return new ThirtyLove();
    }

    public function player2WonPoint() {
        return new FifteenAll();
    }
}
