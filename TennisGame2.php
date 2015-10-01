<?php

require_once "TennisGame.php";
require_once "Score.php";

class TennisGame2 implements TennisGame
{
    private $points;
    private $player1Name = "";
    private $player2Name = "";

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->points[$this->player1Name] = Score::create();
        $this->points[$this->player2Name] = Score::create();
    }

    public function getScore()
    {
        $score = "";
        $P1res = "";
        $P2res = "";
        if ($this->points[$this->player1Name]->get() == $this->points[$this->player2Name]->get() && $this->points[$this->player1Name]->get() < 4) {
            if ($this->points[$this->player1Name]->get()==0)
                $score = "Love-All";
            if ($this->points[$this->player1Name]->get()==1)
                $score = "Fifteen-All";
            if ($this->points[$this->player1Name]->get()==2)
                $score = "Thirty-All";
        }

        if ($this->points[$this->player1Name]->get() == $this->points[$this->player2Name]->get() && $this->points[$this->player1Name]->get() >= 3)
            $score = "Deuce";

        if ($this->points[$this->player1Name]->get() > 0 && $this->points[$this->player2Name]->get() == 0) {
            if ($this->points[$this->player1Name]->get() == 1)
                $P1res = "Fifteen";
            if ($this->points[$this->player1Name]->get() == 2)
                $P1res = "Thirty";
            if ($this->points[$this->player1Name]->get() == 3)
                $P1res = "Forty";

            $P2res = "Love";
            $score = "{$P1res}-{$P2res}";
        }

        if ($this->points[$this->player2Name]->get() > 0 && $this->points[$this->player1Name]->get() == 0) {
            if ($this->points[$this->player2Name]->get() == 1)
                $P2res = "Fifteen";
            if ($this->points[$this->player2Name]->get() == 2)
                $P2res = "Thirty";
            if ($this->points[$this->player2Name]->get() == 3)
                $P2res = "Forty";
            $P1res = "Love";
            $score = "{$P1res}-{$P2res}";
        }

        if ($this->points[$this->player1Name]->get() > $this->points[$this->player2Name]->get() && $this->points[$this->player1Name]->get() < 4) {
            if ($this->points[$this->player1Name]->get() == 2)
                $P1res = "Thirty";
            if ($this->points[$this->player1Name]->get() == 3)
                $P1res = "Forty";
            if ($this->points[$this->player2Name]->get() == 1)
                $P2res = "Fifteen";
            if ($this->points[$this->player2Name]->get() == 2)
                $P2res = "Thirty";
            $score = "{$P1res}-{$P2res}";
        }

        if ($this->points[$this->player2Name]->get() > $this->points[$this->player1Name]->get() && $this->points[$this->player2Name]->get() < 4) {
            if ($this->points[$this->player2Name]->get() == 2)
                $P2res = "Thirty";
            if ($this->points[$this->player2Name]->get() == 3)
                $P2res = "Forty";
            if ($this->points[$this->player1Name]->get() == 1)
                $P1res = "Fifteen";
            if ($this->points[$this->player1Name]->get() == 2)
                $P1res = "Thirty";
            $score = "{$P1res}-{$P2res}";
        }

        if ($this->points[$this->player1Name]->get() > $this->points[$this->player2Name]->get() && $this->points[$this->player2Name]->get() >= 3) {
            $score = "Advantage player1";
        }

        if ($this->points[$this->player2Name]->get() > $this->points[$this->player1Name]->get() && $this->points[$this->player1Name]->get() >= 3) {
            $score = "Advantage player2";
        }

        if ($this->points[$this->player1Name]->get() >= 4 && $this->points[$this->player2Name]->get() >= 0 && ($this->points[$this->player1Name]->get() - $this->points[$this->player2Name]->get()) >= 2) {
            $score = "Win for player1";
        }

        if ($this->points[$this->player2Name]->get() >= 4 && $this->points[$this->player1Name]->get() >= 0 && ($this->points[$this->player2Name]->get() - $this->points[$this->player1Name]->get()) >= 2) {
            $score = "Win for player2";
        }

        return $score;
    }

    public function wonPoint($player)
    {
        $this->points[$player]->add();
    }
}
