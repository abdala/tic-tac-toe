<?php
declare(strict_types=1);

namespace GameTest;

use PHPUnit\Framework\TestCase;
use Game\BoardState;
use Game\PlayerUnit;

Class BoardStateTest extends TestCase
{
    /**
     * @test
     * @dataProvider positions
     */
    public function itReturnAvailablePositions($state, $expected)
    {
        $boardState = new BoardState();
        $positions  = $boardState->availablePositions($state);

        self::assertEquals($expected, $positions);
    }

    /**
     * @test
     * @dataProvider states
     */
    public function itKnowWinner($state, $expected)
    {
        $boardState = new BoardState();
        $isWinner  = $boardState->hasWinner($state, PlayerUnit::X);

        self::assertSame($expected, $isWinner);
    }

    public function states()
    {
        return [
            'Horizontal 0' => [
                [['X', 'X', 'X'],['', '', ''],['', '', '']],
                true
            ],
            'Horizontal 1' => [
                [['', '', ''],['X', 'X', 'X'],['', '', '']],
                true
            ],
            'Horizontal 2' => [
                [['', '', ''],['', '', ''],['X', 'X', 'X']],
                true
            ],
            'Vertical 0' => [
                [['X', '', ''],['X', '', ''],['X', '', '']],
                true
            ],
            'Vertical 1' => [
                [['', 'X', ''],['', 'X', ''],['', 'X', '']],
                true
            ],
            'Vertical 2' => [
                [['', '', 'X'],['', '', 'X'],['', '', 'X']],
                true
            ],
            'Diagonal 1' => [
                [['X', '', ''],['', 'X', ''],['', '', 'X']],
                true
            ],
            'Diagonal 2' => [
                [['', '', 'X'],['', 'X', ''],['X', '', '']],
                true
            ],
            'No winners' => [
                [['', '', ''],['', '', ''],['', '', '']],
                false
            ],
        ];
    }

    public function positions()
    {
        return [
            'In all lines' => [
                [['', '', ''],['', '', ''],['', '', '']],
                [[0,0], [1,0], [2,0], [0,1], [1,1], [2,1], [0,2], [1,2], [2,2]],
            ],
            'In first line' => [
                [['X', '', ''],['X', 'X', 'O'],['O', 'O', 'X']],
                [[1,0],[2,0]],
            ],
            'In second line' => [
                [['X', 'O', 'X'],['', 'X', ''],['O', 'O', 'X']],
                [[0,1],[2,1]],
            ],
            'In third line' => [
                [['X', 'O', 'X'],['X', 'X', 'O'],['O', '', 'X']],
                [[1,2]],
            ],
            'In a full board' => [
                [['X', 'O', 'X'],['X', 'X', 'O'],['O', 'O', 'X']],
                [],
            ],
        ];
    }
}
