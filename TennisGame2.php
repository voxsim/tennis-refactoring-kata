<?php

require_once "TennisGame.php";
require_once "Score.php";
require_once "Display.php";

class TennisGame2 implements TennisGame
{
    private $points;
    private $player1Name = "";
    private $player2Name = "";
    private $display = "";

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->points[$this->player1Name] = Score::create();
        $this->points[$this->player2Name] = Score::create();
        $this->display = Display::create();
    }

    public function getScore()
    {
        $score = "";
        $P1res = "";
        $P2res = "";
        if ($this->points[$this->player1Name]->get() == $this->points[$this->player2Name]->get() && $this->points[$this->player1Name]->get() < 4) {
            if ($this->points[$this->player1Name]->get()==0)
                return $this->display->show();
            if ($this->points[$this->player1Name]->get()==1)
                return "Fifteen-All";
            if ($this->points[$this->player1Name]->get()==2)
                return "Thirty-All";
        }

        if ($this->points[$this->player1Name]->get() == $this->points[$this->player2Name]->get() && $this->points[$this->player1Name]->get() >= 3)
            return "Deuce";

        if ($this->points[$this->player1Name]->get() > 0 && $this->points[$this->player2Name]->get() == 0) {
            if ($this->points[$this->player1Name]->get() == 1)
                return "Fifteen-Love";
            if ($this->points[$this->player1Name]->get() == 2)
                return "Thirty-Love";
            if ($this->points[$this->player1Name]->get() == 3)
                return "Forty-Love";
        }

        if ($this->points[$this->player2Name]->get() > 0 && $this->points[$this->player1Name]->get() == 0) {
            if ($this->points[$this->player2Name]->get() == 1)
                return "Love-Fifteen";
            if ($this->points[$this->player2Name]->get() == 2)
                return "Love-Thirty";
            if ($this->points[$this->player2Name]->get() == 3)
                return "Love-Forty";
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

        if ($this->points[$this->player1Name]->get() >= 4 && $this->points[$this->player2Name]->get() >= 0 && ($this->points[$this->player1Name]->get() - $this->points[$this->player2Name]->get()) >= 2) {
            return "Win for player1";
        }

        if ($this->points[$this->player2Name]->get() >= 4 && $this->points[$this->player1Name]->get() >= 0 && ($this->points[$this->player2Name]->get() - $this->points[$this->player1Name]->get()) >= 2) {
            return "Win for player2";
        }

        if ($this->points[$this->player1Name]->get() > $this->points[$this->player2Name]->get() && $this->points[$this->player2Name]->get() >= 3) {
            return "Advantage player1";
        }

        if ($this->points[$this->player2Name]->get() > $this->points[$this->player1Name]->get() && $this->points[$this->player1Name]->get() >= 3) {
            return "Advantage player2";
        }

        return $score;
    }

    public function wonPoint($player)
    {
        $this->points[$player]->increment();

        if($player == $this->player1Name)
            $this->display->player1WonPoint();
        else
            $this->display->player2WonPoint();
    }
}

interface HumanReadableScore {
    public function value();
}

class LoveAll implements HumanReadableScore {
    public function value() {
        return "Love-All";
    }

    public function player1WonPoint() {
        return $this;
    }

    public function player2WonPoint() {
        return $this;
    }
}

