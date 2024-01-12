<?php
namespace App;

class ActionPerformer {

    public $output;

    /**
     * @param $matrix
     * @return string
     */
    public function echo($matrix) {
        foreach ($matrix as $index => $row){
            $this->output .= implode(",", $row);
            if(($index+1)<count($matrix)) {
                $this->output .= "\n";
            }
        }
        return $this->output;
    }

    /**
     * @param $matrix
     * @return string
     */
    public function invert($matrix) {
        $rows_count = count($matrix);
        $invert = array();

        foreach($matrix as $rindex => $row){
            foreach($row as $cindex => $ele){
                $invert[$cindex][$rindex] = $ele;
            }
        }

        foreach ($invert as $index => $row){
            $this->output .= implode(",", $row);
            if(($index+1)<count($matrix)) {
                $this->output .= "\n";
            }
        }
        return $this->output;
    }

    /**
     * @param $matrix
     * @return string
     */
    public function flatten($matrix) {
        foreach ($matrix as $index => $row){
            $this->output .= implode(",", $row);
            if(($index+1)<count($matrix)){
                $this->output .= ",";
            }
        }

        return $this->output;
    }

    /**
     * @param $matrix
     * @return int|mixed
     */
    public function sum($matrix) {
        $this->output = 0;
        foreach ($matrix as $row){
            foreach ($row as $ele){
                $this->output += $ele;
            }
        }

        return $this->output;
    }

    /**
     * @param $matrix
     * @return int|mixed
     */
    public function multiply($matrix) {
        $this->output = 1;
        foreach ($matrix as $row){
            foreach ($row as $ele){
                $this->output *= $ele;
            }
        }

        return $this->output;
    }
}