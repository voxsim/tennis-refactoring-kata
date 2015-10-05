<?php

class TennisGameImpl implements TennisGame
{
    private $players;
    private $scoreTranslator;

    public function __construct($player1Name, $player2Name)
    {
        $this->players[0] = $this->players[$player1Name] = Player::create($player1Name);
        $this->players[1] = $this->players[$player2Name] = Player::create($player2Name);
        $this->scoreTranslator = new ScoreTranslator();
    }

    public function getScore()
    {
        $player1Score = $this->players[0]->score();
        $player2Score = $this->players[1]->score();
        $player1Name = $this->players[0]->name();
        $player2Name = $this->players[1]->name();
        $score = $this->scoreTranslator->translate($player1Score, $player2Score);
        return $score
            ->replace('player1', $player1Name)
            ->replace('player2', $player2Name)
            ->value();
    }

    public function wonPoint($player)
    {
        $this->players[$player]->winPoint();
    }
}
