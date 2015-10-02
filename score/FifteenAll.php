<?php

class FifteenAll implements HumanReadableScore {
    public function value() {
        return "Fifteen-All";
    }

    public function player1WonPoint() {
        return new ThirtyFifteen();
    }

    public function player2WonPoint() {
        return new FifteenThirty();
    }
}
