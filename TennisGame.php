<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */


class TennisGame
{
    public $score = '';

    const HIGH_SCORE = 4;
    const ADVANCED_SCORE = 1;
    const WIN_SCORE = 2;
    public function getScore($player1Name,$player2Name,$score1, $score2)
    {
        $tempScore=0;

        if ($score1==$score2) {
            switch ($score1)
            {
                case 0:
                    $this->score = "Love-All";
                    break;
                case 1:
                    $this->score = "Fifteen-All";
                    break;
                case 2:
                    $this->score = "Thirty-All";
                    break;
                case 3:
                    $this->score = "Forty-All";
                    break;
                default:
                    $this->score = "Deuce";
                    break;

            }
        }
        else if ($score1>= self:: HIGH_SCORE  || $score2>= self:: HIGH_SCORE )
        {
            $minusResult = $score1-$score2;
            if ($minusResult== self:: ADVANCED_SCORE ) $this->score ="Advantage". $player1Name;
            else if ($minusResult ==-self::ADVANCED_SCORE) $this->score ="Advantage".$player2Name;
            else if ($minusResult>= self:: WIN_SCORE) $this->score = "Win for player1";
            else $this->score ="Win for player2";
        }
        else
        {
            for ($i=1; $i<3; $i++)
            {
                if ($i==1) $tempScore = $score1;
                else { $this->score.="-"; $tempScore = $score2;}
                switch($tempScore)
                {
                    case 0:
                        $this->score.="Love";
                        break;
                    case 1:
                        $this->score.="Fifteen";
                        break;
                    case 2:
                        $this->score.="Thirty";
                        break;
                    case 3:
                        $this->score.="Forty";
                        break;
                }
            }
        }
    }

    public function __toString()
    {
        return $this->score;
    }
}