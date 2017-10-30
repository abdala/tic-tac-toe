# Tic Tac Toe

Customer wants and application - Tic Tac Toe game bot. The application should have an API that can be called to make the moves, and a web interface, where the application can be visible. 

Create a project which:

- has a Tic Tac Toe game inside.
- the application needs to have an API, which could be used to request next move from the application for the game.
- the application needs to have web interface, where game could be played against the bot and viewed in the page. Example: player can select a move, and then the application makes a move using the same API created previously.

## Application API Should implement

```php
interface MoveInterface
{
  /**
  * Makes a move using the $boardState
  * $boardState contains 2 dimensional array of the game field
  * X represents one team, O - the other team, empty string means field is not yet taken.
  * example
  * [['X', 'O', '']
  * ['X', 'O', 'O']
  * ['', '', '']]
  * Returns an array, containing x and y coordinates for next move, and th e unit that now occupies it.
  * Example: [2, 0, 'O'] - upper right corner - O player
  *
  * @param array $boardState Current board state
  * @param string $playerUnit Player unit representation
  *
  * @return array
  */
  public function makeMove($boardState, $playerUnit = 'X');
}
```
