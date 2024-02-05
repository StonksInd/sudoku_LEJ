<?php
// php .\vendor\bin\phpunit --bootstrap vendor/autoload.php tests


$sudokuGrid = SudokuGrid::loadFromFile('grids/grid2.json');


$solver = new SudokuSolver($sudokuGrid);

$solver->solve();
// je n'ai pas pus finir