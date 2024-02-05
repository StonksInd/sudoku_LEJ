<?php
        require_once 'SudokuGrid.php';

        interface SolverInterface {
            public function solve();
        }
        
        class SudokuSolver implements SolverInterface {
            public $grid;
        
            public function __construct(SudokuGrid $grid) {
                $this->grid = $grid;
            }
        
            public function solve() {
                while($this->grid->isFilled()==false){

                
                $nextRowColumn = $this->grid->getNextRowColumn(0,0);
                for($i=1;$i<9;$i++){
                    $isValid =$this->grid->isValueValidForPosition($nextRowColumn[0],$nextRowColumn[1],$i);
                    if ($isValid) {
                        $this->grid->set($nextRowColumn[0],$nextRowColumn[1],$i);
                    }
                }



            }

            if($this->grid->$isValid()==true){
                $this->grid->display() . PHP_EOL;
                echo "la grille est valide";
                
            }
            else{
                echo "la grille n'est pas complète";
            }
            }
        }
        
