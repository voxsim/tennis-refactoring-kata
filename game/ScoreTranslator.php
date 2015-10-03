<?php

class ScoreTranslator {
    public function translate($player1, $player2) {
        $player1Score = $player1->score();
        $player2Score = $player2->score();
        $player1Name = $player1->name();
        $player2Name = $player2->name();

        if ($player1Score == $player2Score && $player1Score > 3)
            return "Deuce";

        if ($player1Score >= 4 && $player2Score >= 0 && ($player1Score - $player2Score) >= 2)
            return "Win for " . $player1Name;

        if ($player2Score >= 4 && $player1Score >= 0 && ($player2Score - $player1Score) >= 2)
            return "Win for " . $player2Name;

        if ($player1Score > $player2Score && $player2Score >= 3)
            return "Advantage " . $player1Name;

        if ($player2Score > $player1Score && $player1Score >= 3)
            return "Advantage " . $player2Name;

        $score =  new String($player1Score.'-'.$player2Score);
        return $score
            ->replace('0', 'Love')
            ->replace('1', 'Fifteen')
            ->replace('2', 'Thirty')
            ->replace('3', 'Forty')
            ->replace('Love-Love', 'Love-All')
            ->replace('Fifteen-Fifteen', 'Fifteen-All')
            ->replace('Thirty-Thirty', 'Thirty-All')
            ->replace('Forty-Forty', 'Deuce')
            ->value();
    }
}
