<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RalltiirPlayers
 * @package Hackathon\PlayerIA
 * @author MARIEME NDIAYE
 */
class RalltiirPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function lessCurrentChoice($getStats){
        $nbsci = $getStats["scissors"];
        $nbpap = $getStats["paper"];
        $nbrock = $getStats["rock"];

        if ($nbsci <= $nbpap && $nbsci <= $nbrock)
            return parent::scissorsChoice();
        else if ($nbpap <= $nbsci && $nbpap <= $nbrock)
            return parent::paperChoice();
        else
            return parent::rockChoice();
    }

    public function moreCurrentChoice($getStats){
        $nbsci = $getStats["scissors"];
        $nbpap = $getStats["paper"];
        $nbrock = $getStats["rock"];

        if ($nbsci >= $nbpap && $nbsci >= $nbrock)
            return parent::scissorsChoice();
        else if ($nbpap > $nbsci && $nbpap > $nbrock)
            return parent::paperChoice();
        else
            return parent::rockChoice();
    }

    public function getChoice()
    {
        $myOpponentLessCurrentChoice = $this->lessCurrentChoice($this->result->getStatsFor($this->opponentSide));
        $myOpponentMoreCurrentChoice = $this->moreCurrentChoice($this->result->getStatsFor($this->opponentSide));
        $myOpponentLessCurrentChoice = $this->lessCurrentChoice($this->result->getStatsFor($this->opponentSide));
        $myOpponentMoreCurrentChoice = $this->moreCurrentChoice($this->result->getStatsFor($this->opponentSide));
        $myLessCurrentChoice = $this->lessCurrentChoice($this->result->getStatsFor($this->mySide));
        $myMoreCurrentChoice = $this->moreCurrentChoice($this->result->getStatsFor($this->mySide));
        $myLastChoice = $this->result->getLastChoiceFor($this->mySide);
        $myOpponentLastChoice = $this->result->getLastChoiceFor($this->opponentSide);
        
        if (($myOpponentLastChoice === $myOpponentMoreCurrentChoice) && ($myMoreCurrentChoice !== $myOpponentLastChoice))
            return $myMoreCurrentChoice;

        if ($myOpponentLastChoice === $myOpponentLessCurrentChoice)
            return $myOpponentLastChoice;

        if ($myMoreCurrentChoice === $myLastChoice)
            return $myOpponentMoreCurrentChoice;

        if ($myOpponentLastChoice === $myMoreCurrentChoice)
            return $myOpponentMoreCurrentChoice;
        

        return $myLessCurrentChoice;
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
    }
};
