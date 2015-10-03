<?php

class ScoreTranslator {
    public function translate($player1, $player2) {
        $player1Score = $player1->score();
        $player2Score = $player2->score();
        $player1Name = $player1->name();
        $player2Name = $player2->name();
        $playersScore = $player1Score + $player2Score;

        if($playersScore > 8) {
            $playersDiff = $player1Score - $player2Score;
            $score = array();
            $score[0] = "Deuce";
            $score[1] = "Advantage " . $player1Name;
            $score[-1] = "Advantage " . $player2Name;
            $score[2] = "Win for " . $player1Name;
            $score[-2] = "Win for " . $player2Name;
            return $score[$playersDiff];
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
            ->replace('4-Love', "Win for " . $player1Name)
            ->replace('4-Fifteen', "Win for " . $player1Name)
            ->replace('4-Thirty', "Win for " . $player1Name)
            ->replace('4-Forty', "Advantage " . $player1Name)
            ->replace('4-4', "Deuce")
            ->replace('Love-4', "Win for " . $player2Name)
            ->replace('Fifteen-4', "Win for " . $player2Name)
            ->replace('Thirty-4', "Win for " . $player2Name)
            ->replace('Forty-4', "Advantage " . $player2Name)
            ->value();
    }
}
