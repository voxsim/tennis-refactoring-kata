<?php

class ScoreTranslator {
    public function translate($player1Score, $player2Score) {
        if($this->pointsAreOutOfBounds($player1Score, $player2Score)) {
            $playersDiff = $player1Score - $player2Score;
            $score = array();
            $score[0] = "Deuce";
            $score[1] = "Advantage player1";
            $score[-1] = "Advantage player2";
            $score[2] = "Win for player1";
            $score[-2] = "Win for player2";
            return new String($score[$playersDiff]);
        }

        $score =  new String($player1Score.'-'.$player2Score);
        $score = $this->translatePoints($score);
        $score = $this->translateFairPlay($score);
        $score = $this->translateWinningForTheFirstPlayer($score);
        $score = $this->translateWinningForTheSecondPlayer($score);
        return $score;
    }

    private function pointsAreOutOfBounds($player1Score, $player2Score) {
        return $player1Score + $player2Score > 8;
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
            ->replace('Forty-Forty', 'Deuce')
            ->replace('4-4', "Deuce");
    }

    private function translateWinningForTheFirstPlayer($score) {
        return $score
            ->replace('4-Love', "Win for player1")
            ->replace('4-Fifteen', "Win for player1")
            ->replace('4-Thirty', "Win for player1")
            ->replace('4-Forty', "Advantage player1");
    }

    private function translateWinningForTheSecondPlayer($score) {
        return $score
            ->replace('Love-4', "Win for player2")
            ->replace('Fifteen-4', "Win for player2")
            ->replace('Thirty-4', "Win for player2")
            ->replace('Forty-4', "Advantage player2");
    }
}
