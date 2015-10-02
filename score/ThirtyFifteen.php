<?php

class ThirtyFifteen implements HumanReadableScore {
    public function value() {
        return "Thirty-Fifteen";
    }

    public function player1WonPoint() {
        return new FortyFifteen();
    }

    public function player2WonPoint() {
        return new ThirtyAll();
    }
}
