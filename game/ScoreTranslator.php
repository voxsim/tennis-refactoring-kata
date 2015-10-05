<?php

class ScoreTranslator {
    public function translate($player1Score, $player2Score) {
        $score =  new String($player1Score.'-'.$player2Score);
        $score = $this->translatePoints($score);
        return $this->translateFairPlay($score)
            ->replace('4-Love', "Win for player1")
            ->replace('4-Fifteen', "Win for player1")
            ->replace('4-Thirty', "Win for player1")
            ->replace('4-Forty', "Advantage player1")
            ->replace('4-4', "Deuce")
            ->replace('Love-4', "Win for player2")
            ->replace('Fifteen-4', "Win for player2")
            ->replace('Thirty-4', "Win for player2")
            ->replace('Forty-4', "Advantage player2");
    }

    private function translatePoints($score) {
        return $score
            ->replace('0', 'Love')
            ->replace('1', 'Fifteen')
            ->replace('2', 'Thirty')
            ->replace('3', 'Forty');
    }

    private function translateFairPlay($score) {
        return $score
            ->replace('Love-Love', 'Love-All')
            ->replace('Fifteen-Fifteen', 'Fifteen-All')
            ->replace('Thirty-Thirty', 'Thirty-All')
            ->replace('Forty-Forty', 'Deuce');
    }
}
