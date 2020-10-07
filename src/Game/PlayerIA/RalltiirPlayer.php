<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RalltiirPlayers
 * @package Hackathon\PlayerIA
 * @author YOUR NAME HERE
 */
class RalltiirPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        $nbsci = $this->result->getStatsFor($this->opponentSide)["scissors"];
        $nbpap = $this->result->getStatsFor($this->opponentSide)["paper"];
        $nbrock = $this->result->getStatsFor($this->opponentSide)["rock"];

        $myOpponentLessCurrentChoice = "";

        if ($nbsci <= $nbpap && $nbsci <= $nbrock)
            $myOpponentLessCurrentChoice = parent::scissorsChoice();
        else if ($nbpap < $nbsci && $nbpap < $nbrock)
            $myOpponentLessCurrentChoice = parent::paperChoice();
        else
            $myOpponentLessCurrentChoice = parent::rockChoice();
        
        if ($this->result->getLastChoiceFor($this->mySide) === $myOpponentLessCurrentChoice)
            return $myOpponentLessCurrentChoice;

        else
            return parent::paperChoice();
        
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
