<?php

class ThirtyAll implements HumanReadableScore {
    public function value() {
        return "Thirty-All";
    }

    public function player1WonPoint() {
        return new FortyThirty();
    }

    public function player2WonPoint() {
        return new ThirtyForty();
    }
}
