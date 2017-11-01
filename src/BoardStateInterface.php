<?php
declare(strict_types=1);

namespace Game;

interface BoardStateInterface
{
    /**
     * Retrieve available position in a given state
     * example
     * [['X', 'O', '']
     * ['X', 'O', 'O']
     * ['', '', '']]
     * Returns an array, containing x and y coordinates availables.
     * Example: [[2, 0],[0, 2], [0, 1], [0, 2]]
     *
     * @param array $boardState Current board state
     *
     * @return array
     */
    public function availablePositions(array $boardState) : array;

    /**
     * Check if the game was a winner
     *
     * @param array $boardState
     * @param string $playerUnit
     *
     * @return boolean
     */
    public function hasWinner(array $boardState, string $playerUnit) : bool;
}

