<?php

class LoveFifteen implements HumanReadableScore {
    public function value() {
        return "Love-Fifteen";
    }

    public function player1WonPoint() {
        return new FifteenAll();
    }

    public function player2WonPoint() {
        return new LoveThirty();
    }
}
