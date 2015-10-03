<?php

require_once "TennisGame.php";
require_once "game/Player.php";
require_once "game/String.php";
require_once "game/ScoreTranslator.php";

class TennisGame2 implements TennisGame
{
    private $players;

    public function __construct($player1Name, $player2Name)
    {
        $this->player1 = Player::create($player1Name);
        $this->player2 = Player::create($player2Name);
        $this->players[$player1Name] = $this->player1;
        $this->players[$player2Name] = $this->player2;
        $this->scoreTranslator = new ScoreTranslator();
    }

    public function getScore()
    {
        return $this->scoreTranslator->translate($this->player1, $this->player2);
    }

    public function wonPoint($player)
    {
        $this->players[$player]->winPoint();
    }
}
