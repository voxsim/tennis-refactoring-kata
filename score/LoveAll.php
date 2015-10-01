<?php

class LoveAll implements HumanReadableScore {
    public function value() {
        return "Love-All";
    }

    public function player1WonPoint() {
        return new FifteenLove();
    }

    public function player2WonPoint() {
        return new LoveFifteen();
    }
}
