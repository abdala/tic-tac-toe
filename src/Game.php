<?php
declare(strict_types=1);

namespace Game;

use Game\Exception\FullBoardException;
use Game\Exception\GameOverException;

final class Game implements MoveInterface
{
    /**
     * @var BoardStateInterface
     */
    private $boardState;

    public function __construct(BoardStateInterface $boardState) 
    {
        $this->boardState = $boardState;
    }

    public function makeMove(array $boardState, string $playerUnit = 'X') : array
    {
        if ($this->boardState->hasWinner($boardState, $playerUnit)) {
            throw new GameOverException(); 
        }

        $availablePositions = $this->boardState->availablePositions($boardState);

        if (! $availablePositions) {
            throw new FullBoardException();
        }

        $position = $this->nextPosition($availablePositions);

        $position[] = $playerUnit === PlayerUnit::O ? PlayerUnit::X : PlayerUnit::O;

        return $position;
    }

    private function nextPosition(array $positions) : array
    {
        return $positions[array_rand($positions)];
    }
}
