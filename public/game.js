(function($){
    var boardState = [['','',''],['','',''],['','','']];
    var playerUnit = 'X';

    function init() {
        $('.square').click(click);
    }

    function click(event) {
        updateBoardState(playerUnit, this.id);

        $.post('move.php', {boardState: boardState, playerUnit: playerUnit}, move);
    }

    function updateBoardState(playerUnit, id) {
        $('#' + id).text(playerUnit)
                   .unbind('click');

        $('#game div.square').each(function(i, element) {
            var $element = $(element);
            var x = $element.data('x');
            var y = $element.data('y');

            boardState[y][x] = $element.text();
        });
    }

    function move(response) {
        if (response.status == 'end') {
            $('#status').text('Game over');
            return;
        }

        if (response.status == 'full') {
            $('#status').text('Game over. No more moves.');
            return;
        }

        updateBoardState('O', 'square_' + response.data[0] + '_' + response.data[1]);
    }

    init();
})(jQuery);

