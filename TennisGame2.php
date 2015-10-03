<?php

require_once "TennisGame.php";
require_once "game/Player.php";
require_once "game/String.php";
require_once "game/ScoreTranslator.php";

class TennisGame2 implements TennisGame
{
    private $players;
    private $player1Name = "";
    private $player2Name = "";

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->players[$this->player1Name] = Player::create();
        $this->players[$this->player2Name] = Player::create();
        $this->scoreTranslator = new ScoreTranslator();
    }

    public function getScore()
    {
        $player1Score = $this->players[$this->player1Name]->get();
        $player2Score = $this->players[$this->player2Name]->get();

        if ($player1Score == $player2Score && $player1Score > 3)
            return "Deuce";

        if ($player1Score >= 4 && $player2Score >= 0 && ($player1Score - $player2Score) >= 2)
            return "Win for " . $this->player1Name;

        if ($player2Score >= 4 && $player1Score >= 0 && ($player2Score - $player1Score) >= 2)
            return "Win for " . $this->player2Name;

        if ($player1Score > $player2Score && $player2Score >= 3)
            return "Advantage " . $this->player1Name;

        if ($player2Score > $player1Score && $player1Score >= 3)
            return "Advantage " . $this->player2Name;

        $score =  $player1Score.'-'.$player2Score;
        return $this->scoreTranslator->translate($score);
    }

    public function wonPoint($player)
    {
        $this->players[$player]->increment();
    }
}
