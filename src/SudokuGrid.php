<?php

use PhpParser\Node\Stmt\Throw_;

class SudokuGrid implements GridInterface
{

    public static function loadFromFile($filepath): ?SudokuGrid{
        if(!file_exists($filepath)){
            return null;
        }
        $data = file_get_contents($filepath);
        $obj = json_decode($data, true);
        if($obj === null){
            return null;
        }
        return new SudokuGrid($obj);
        
    }

    public array $data;
   public function __construct(array $data){
    $this->data = $data;

   }


   public function get(int $rowIndex, int $columnIndex): int{

    return $this->data[$rowIndex][$columnIndex];
   }


   public function set(int $rowIndex, int $columnIndex, int $value): void{
    $this->data[$rowIndex][$columnIndex] = $value;

   }


   public function row(int $rowIndex): array{

    return $this->data[$rowIndex];

   }


   public function column(int $columnIndex): array{

    return array_column($this->data, $columnIndex);

   }


   public function square(int $squareIndex): array{
    $block_data = [];
    $row = intdiv($squareIndex, 3)*3;
    $collumn = ($squareIndex %3)*3;
    for($i=0;$i<3;$i++){
        for($j=0;$j<3;$j++){
            array_push($block_data, $this->data[$row+$i][$collumn+$j]);
        }
    }
    return $block_data;

   }


   public function display(): string{
    $display = "";
    for($i=0;$i<9;$i++){
        for($j=0;$j<9;$j++){
            $display .= " " . $this->data[$i][$j];
        }
        $display .= PHP_EOL;
    }

    return $display;

   }


   public function isValueValidForPosition(int $rowIndex, int $columnIndex, int $value): bool {
    for ($i = 0; $i < 9; $i++) {
        if ($i != $columnIndex and $this->data[$rowIndex][$i] === $value) {
            return false;
        }
    }

    for ($i = 0; $i < 9; $i++) {
        if ($i != $rowIndex and $this->data[$i][$columnIndex] === $value) {
            return false;
        }
    }

    $startRow = intdiv($rowIndex, 3) * 3;
    $startCol = intdiv($columnIndex, 3) * 3;
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if (($startRow + $i != $rowIndex or $startCol + $j != $columnIndex) and $this->data[$startRow + $i][$startCol + $j] === $value) {
                return false;
            }
        }
    }
    return true;
}



   public function getNextRowColumn(int $rowIndex, int $columnIndex): array{

    $columnIndex +=1;

    if($columnIndex>8){
        $columnIndex=0;
        $rowIndex += 1;
    }

    if($rowIndex>8){
        return [null,null];
    }
    
    return [$rowIndex,$columnIndex];

   }

 
   public function isValid(): bool {
    for ($rowIndex = 0; $rowIndex < 9; $rowIndex++) {
        for ($columnIndex = 0; $columnIndex < 9; $columnIndex++) {
            $value = $this->data[$rowIndex][$columnIndex];

            if ($value === 0) {
                return false;
            }

            for ($i = 0; $i < 9; $i++) {
                if ($i != $columnIndex and $this->data[$rowIndex][$i] === $value) {
                    return false;
                }
            }

            for ($i = 0; $i < 9; $i++) {
                if ($i != $rowIndex and $this->data[$i][$columnIndex] === $value) {
                    return false;
                }
            }

            $row = intdiv($rowIndex, 3) * 3;
            $col = intdiv($columnIndex, 3) * 3;
            for ($j = 0; $j < 3; $j++) {
                for ($k = 0; $k < 3; $k++) {
                    if (($row + $j != $rowIndex or $col + $k != $columnIndex) and $this->data[$row + $j][$col + $k] === $value) {
                        return false;
                    }
                }
            }
        }
    }
    return true;
}



   public function isFilled(): bool{
        for($rowIndex =0;$rowIndex<9;$rowIndex++){
            for($columnIndex=0;$columnIndex<9;$columnIndex++){
                $value = $this->data[$rowIndex][$columnIndex];

                if($value ===0){
                    return false;
                }

            }
         }
        return true;

    }

}