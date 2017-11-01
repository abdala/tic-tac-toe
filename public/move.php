<?php

require __DIR__ . '/../vendor/autoload.php';

function response($status, $data) {
    header('Content-type: application/json');
    echo json_encode(compact('status', 'data'));
    exit;
}

if (! $_POST) {
    return;
}

try {
    $game = new Game\Game(new Game\BoardState);
    $nextMove = $game->makeMove($_POST['boardState'], $_POST['playerUnit']);
} catch(Game\Exception\FullBoardException $e) {
    response('full', []);
} catch(Game\Exception\GameOverException $e) {
    response('end', []);
}

response('next', $nextMove);

