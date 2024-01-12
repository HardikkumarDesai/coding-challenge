<?php
use PHPUnit\Framework\TestCase;
use App\ActionPerformer;

class ActionPerformerTest extends TestCase
{
    protected $matrix = [
      [1,2,3],
      [4,5,6],
      [7,8,9]
    ];

    protected $output = [
        'echo' => "1,2,3\n4,5,6\n7,8,9",
        'invert' => "1,4,7\n2,5,8\n3,6,9",
        'flatten' => "1,2,3,4,5,6,7,8,9",
        'sum' => 45,
        'multiply' => 362880,
    ];

    public function testEcho() {
        $ActionPerformer = new ActionPerformer();
        $output = $ActionPerformer->echo($this->matrix);
        $this->assertEquals($this->output['echo'], $output);
    }

    public function testInvert() {
        $ActionPerformer = new ActionPerformer();
        $output = $ActionPerformer->invert($this->matrix);
        $this->assertEquals($this->output['invert'], $output);
    }
    public function testFlatten() {
        $ActionPerformer = new ActionPerformer();
        $output = $ActionPerformer->flatten($this->matrix);
        $this->assertEquals($this->output['flatten'], $output);
    }
    public function testSum() {
        $ActionPerformer = new ActionPerformer();
        $output = $ActionPerformer->sum($this->matrix);
        $this->assertEquals($this->output['sum'], $output);
    }
    public function testMultiply() {
        $ActionPerformer = new ActionPerformer();
        $output = $ActionPerformer->multiply($this->matrix);
        $this->assertEquals($this->output['multiply'], $output);
    }
}
