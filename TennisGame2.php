<?php

require_once "TennisGame.php";
require_once "Player.php";
require_once "String.php";
require_once "ScoreTranslator.php";

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
        if ($this->players[$this->player1Name]->get() == $this->players[$this->player2Name]->get() && $this->players[$this->player1Name]->get() >= 3)
            return "Deuce";

        if ($this->players[$this->player1Name]->get() >= 4 && $this->players[$this->player2Name]->get() >= 0 && ($this->players[$this->player1Name]->get() - $this->players[$this->player2Name]->get()) >= 2) {
            return "Win for " . $this->player1Name;
        }

        if ($this->players[$this->player2Name]->get() >= 4 && $this->players[$this->player1Name]->get() >= 0 && ($this->players[$this->player2Name]->get() - $this->players[$this->player1Name]->get()) >= 2) {
            return "Win for " . $this->player2Name;
        }

        if ($this->players[$this->player1Name]->get() > $this->players[$this->player2Name]->get() && $this->players[$this->player2Name]->get() >= 3) {
            return "Advantage " . $this->player1Name;
        }

        if ($this->players[$this->player2Name]->get() > $this->players[$this->player1Name]->get() && $this->players[$this->player1Name]->get() >= 3) {
            return "Advantage " . $this->player2Name;
        }

        $score =  $this->players[$this->player1Name]->get().'-'.$this->players[$this->player2Name]->get();
        return $this->scoreTranslator->translate($score);
    }

    public function wonPoint($player)
    {
        $this->players[$player]->increment();
    }
}
