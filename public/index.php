<html>
    <head>
        <title>Tic Tac Toe</title>
        <link href="game.css" rel="stylesheet">
    </head>
    <body>
        <h1>Tic Tac Toe</h1>
        <div id="game">        
        <?php foreach ([0,1,2] as $x):?>
            <?php foreach ([0,1,2] as $y):?>
                <div class="square" id="square_<?=$x?>_<?=$y?>" data-x="<?=$x?>" data-y="<?=$y?>"></div>
            <?php endforeach; ?>
            <div class="clear"></div>
        <?php endforeach; ?>
        </div>
        <div id="status"></div>
        <script src="jquery-3.2.1.min.js"></script>
        <script src="game.js"></script>
    </body>
</html>
