<?php

class ScoreTranslator {
    public function translate($player1, $player2) {
        $player1Score = $player1->score();
        $player2Score = $player2->score();
        $player1Name = $player1->name();
        $player2Name = $player2->name();
        $playersScore = $player1Score + $player2Score;

        if($playersScore > 7) {
            if (($player1Score - $player2Score) == 0)
                return "Deuce";

            if (($player1Score - $player2Score) == 2)
                return "Win for " . $player1Name;

            if (($player2Score - $player1Score) == 2)
                return "Win for " . $player2Name;

            if (($player1Score - $player2Score) == 1)
                return "Advantage " . $player1Name;

            if (($player2Score - $player1Score) == 1)
                return "Advantage " . $player2Name;
        }

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
            ->replace('4-4', "Deuce")
            ->replace('4-Love', "Win for " . $player1Name)
            ->replace('4-Fifteen', "Win for " . $player1Name)
            ->replace('4-Thirty', "Win for " . $player1Name)
            ->replace('4-Forty', "Advantage " . $player1Name)
            ->replace('Love-4', "Win for " . $player2Name)
            ->replace('Fifteen-4', "Win for " . $player2Name)
            ->replace('Thirty-4', "Win for " . $player2Name)
            ->replace('Forty-4', "Advantage " . $player2Name)
            ->value();
    }
}
