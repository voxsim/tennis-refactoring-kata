<?php

require_once "TennisGame.php";
require_once "Score.php";

class TennisGame2 implements TennisGame
{
    private $P1point;
    private $P2point;
    private $P1res = "";
    private $P2res = "";
    private $player1Name = "";
    private $player2Name = "";

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->P1point = Score::create();
        $this->P2point = Score::create();
    }

    public function getScore()
    {
        $score = "";
        if ($this->P1point->get() == $this->P2point->get() && $this->P1point->get() < 4) {
            if ($this->P1point->get()==0)
                $score = "Love-All";
            if ($this->P1point->get()==1)
                $score = "Fifteen-All";
            if ($this->P1point->get()==2)
                $score = "Thirty-All";
        }

        if ($this->P1point->get() == $this->P2point->get() && $this->P1point->get() >= 3)
            $score = "Deuce";

        if ($this->P1point->get() > 0 && $this->P2point->get() == 0) {
            if ($this->P1point->get() == 1)
                $this->P1res = "Fifteen";
            if ($this->P1point->get() == 2)
                $this->P1res = "Thirty";
            if ($this->P1point->get() == 3)
                $this->P1res = "Forty";

            $this->P2res = "Love";
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P2point->get() > 0 && $this->P1point->get() == 0) {
            if ($this->P2point->get() == 1)
                $this->P2res = "Fifteen";
            if ($this->P2point->get() == 2)
                $this->P2res = "Thirty";
            if ($this->P2point->get() == 3)
                $this->P2res = "Forty";
            $this->P1res = "Love";
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P1point->get() > $this->P2point->get() && $this->P1point->get() < 4) {
            if ($this->P1point->get() == 2)
                $this->P1res = "Thirty";
            if ($this->P1point->get() == 3)
                $this->P1res = "Forty";
            if ($this->P2point->get() == 1)
                $this->P2res = "Fifteen";
            if ($this->P2point->get() == 2)
                $this->P2res = "Thirty";
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P2point->get() > $this->P1point->get() && $this->P2point->get() < 4) {
            if ($this->P2point->get() == 2)
                $this->P2res = "Thirty";
            if ($this->P2point->get() == 3)
                $this->P2res = "Forty";
            if ($this->P1point->get() == 1)
                $this->P1res = "Fifteen";
            if ($this->P1point->get() == 2)
                $this->P1res = "Thirty";
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P1point->get() > $this->P2point->get() && $this->P2point->get() >= 3) {
            $score = "Advantage player1";
        }

        if ($this->P2point->get() > $this->P1point->get() && $this->P1point->get() >= 3) {
            $score = "Advantage player2";
        }

        if ($this->P1point->get() >= 4 && $this->P2point->get() >= 0 && ($this->P1point->get() - $this->P2point->get()) >= 2) {
            $score = "Win for player1";
        }

        if ($this->P2point->get() >= 4 && $this->P1point->get() >= 0 && ($this->P2point->get() - $this->P1point->get()) >= 2) {
            $score = "Win for player2";
        }

        return $score;
    }

    private function P1Score()
    {
        $this->P1point->add();
    }

    private function P2Score()
    {
        $this->P2point->add();
    }

    public function wonPoint($player)
    {
        if ($player == "player1")
            $this->P1Score();
        else
            $this->P2Score();
    }
}
