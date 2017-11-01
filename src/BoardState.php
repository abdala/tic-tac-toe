<?php
declare(strict_types=1);

namespace Game;

final class BoardState implements BoardStateInterface
{
    public function availablePositions(array $boardState) : array
    {
        $positions = [];
 
        foreach ($boardState as $y => $lines) {
            foreach ($lines as $x => $line) {
                if (! $line) {
                    $positions[] = [$x,$y];
                }
            }
        }
        
        return $positions;
    }

    public function hasWinner(array $boardState, string $player) : bool
    {
        //horizontal
        foreach ($boardState as $line) {
            if($line[0] === $player 
               && $line[1] === $player 
               && $line[2] === $player
            ){
                return true;
            }
        }

        //vertical
        $vertical = [];

        foreach ($boardState as $line) {
            $vertical[0][] = $line[0] === $player;
            $vertical[1][] = $line[1] === $player;
            $vertical[2][] = $line[2] === $player;
        }

        $filter0 = array_filter($vertical[0]);
        $filter1 = array_filter($vertical[1]);
        $filter2 = array_filter($vertical[2]);

        if (($filter0 && count($filter0) === 3) 
            || ($filter1 && count($filter1) === 3)
            || ($filter2 && count($filter2) === 3)
        ) {
            return true;
        }

        //diagonal
        if (($boardState[0][0] === $player 
            && $boardState[1][1] === $player 
            && $boardState[2][2] === $player)
            || ($boardState[0][2] === $player 
            && $boardState[1][1] === $player 
            && $boardState[2][0] === $player)
        ) {
            return true;
        }

        return false;
    }
}

