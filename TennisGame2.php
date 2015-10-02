<?php

require_once "TennisGame.php";
require_once "TennisScore.php";
require_once "score/HumanReadableScore.php";
require_once "score/LoveAll.php";
require_once "score/LoveFifteen.php";
require_once "score/LoveThirty.php";
require_once "score/LoveForty.php";
require_once "score/FifteenAll.php";
require_once "score/FifteenLove.php";
require_once "score/FifteenThirty.php";
require_once "score/FifteenForty.php";
require_once "score/ThirtyAll.php";
require_once "score/ThirtyLove.php";
require_once "score/ThirtyFifteen.php";
require_once "score/ThirtyForty.php";
require_once "score/FortyAll.php";
require_once "score/FortyLove.php";
require_once "score/FortyFifteen.php";
require_once "score/FortyThirty.php";

class TennisGame2 implements TennisGame
{
    private $points;
    private $player1Name = "";
    private $player2Name = "";
    private $humanReadableScore;

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->points[$this->player1Name] = TennisScore::create();
        $this->points[$this->player2Name] = TennisScore::create();
        $this->humanReadableScore = new LoveAll();
    }

    public function getScore()
    {
        if ($this->points[$this->player1Name]->get() == $this->points[$this->player2Name]->get() && $this->points[$this->player1Name]->get() >= 3)
            return "Deuce";

        if ($this->points[$this->player1Name]->get() >= 4 && $this->points[$this->player2Name]->get() >= 0 && ($this->points[$this->player1Name]->get() - $this->points[$this->player2Name]->get()) >= 2) {
            return "Win for " . $this->player1Name;
        }

        if ($this->points[$this->player2Name]->get() >= 4 && $this->points[$this->player1Name]->get() >= 0 && ($this->points[$this->player2Name]->get() - $this->points[$this->player1Name]->get()) >= 2) {
            return "Win for " . $this->player2Name;
        }

        if ($this->points[$this->player1Name]->get() > $this->points[$this->player2Name]->get() && $this->points[$this->player2Name]->get() >= 3) {
            return "Advantage " . $this->player1Name;
        }

        if ($this->points[$this->player2Name]->get() > $this->points[$this->player1Name]->get() && $this->points[$this->player1Name]->get() >= 3) {
            return "Advantage " . $this->player2Name;
        }

        return $this->humanReadableScore->value();
    }

    public function wonPoint($player)
    {
        $this->points[$player]->increment();

        if($player == $this->player1Name)
            $this->humanReadableScore = $this->humanReadableScore->player1WonPoint();
        else
            $this->humanReadableScore = $this->humanReadableScore->player2WonPoint();
    }
}
