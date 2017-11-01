<?php
declare(strict_types=1);

namespace GameTest;

use PHPUnit\Framework\TestCase;
use Game\Game;
use Game\PlayerUnit;
use Game\BoardStateInterface;

Class GameTest extends TestCase
{
    /**
     * @test
     * @dataProvider validMoves
     */
    public function itCanMove($state, $playerUnit, $expected)
    {
        $boardState = $this->createMock(BoardStateInterface::class);

        $boardState->method('availablePositions')
                   ->willReturn([[0,0]]);

        $boardState->method('hasWinner')
                   ->willReturn(false);

        $game = new Game($boardState);

        $nextPosition = $game->makeMove($state, $playerUnit);
        
        self::assertTrue(is_int($nextPosition[0]));
        self::assertTrue(is_int($nextPosition[1]));
        self::assertEquals($expected[2], $nextPosition[2]);
    }

    /**
     * @test
     * @expectedException Game\Exception\FullBoardException
     */
    public function itThrowExceptionWhenBoardIsFull()
    {
        $boardState = $this->createMock(BoardStateInterface::class);

        $boardState->method('availablePositions')
                   ->willReturn([]);

        $boardState->method('hasWinner')
                   ->willReturn(false);

        $game = new Game($boardState);

        $game->makeMove([], PlayerUnit::O);
    }

    public function validMoves()
    {
        return [
            'player X' => [
                [[],[],[]],
                PlayerUnit::X,
                [0, 0, PlayerUnit::O]
            ],
            'player O' => [
                [[],[],[]],
                PlayerUnit::O,
                [0, 0, PlayerUnit::X]
            ],
        ];
    }
}
