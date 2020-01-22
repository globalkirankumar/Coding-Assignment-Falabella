<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FalabellaAssignmentCode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }
    
    public function index()
    {
        phpinfo();
    }
    private function printNumbers($start_no=1,$end_no=100)
    {
        $result='';
        if($start_no>0 && $end_no>0 && $end_no>=$start_no)
        {
            for($i=$start_no;$i<=$end_no;$i++)
            {
                switch ($i) 
                {
                    case ($i%3==0 && $i%5==0):
                        $result.="Linianos,";
                        break;
                    case ($i%3==0):
                        $result.="Linio,";
                        break;
                    case ($i%5==0):
                        $result.="IT,";
                        break;
                    default:
                        $result.=$i.",";
                        break;
                }
            }
        }
        $result=trim($result,',');
        return  $result;
    }
    
    public function testPrintNumbers()
    {
        $start_no=1;
        $end_no=10;
        $test=$this->printNumbers($start_no,$end_no);
        $expected_result='1,2,Linio,4,IT,Linio,7,8,Linio,IT';
        $test_name="Output values test";
        echo $this->unit->run($test,$expected_result,$test_name);
        
    }
    
    public function testOutputIsString()
    {
        $start_no=1;
        $end_no=5;
        $test=$this->printNumbers($start_no,$end_no);
        $test_name="Test output is string or not";
        echo $this->unit->run($test, 'is_string',$test_name);
    }
    
    public function testEndNOLessThanStartNO()
    {
        $start_no=5;
        $end_no=1;
        $test=$this->printNumbers($start_no,$end_no);
        $expected_result='';
        $test_name="End number is less than Start number";
        echo $this->unit->run($test,$expected_result,$test_name);
    }
    
    public function testParmNegativeValue()
    {
        $start_no=-1;
        $end_no=6;
        $test=$this->printNumbers($start_no,$end_no);
        $expected_result='';
        $test_name="Any parameters value may be less than zero";
        echo $this->unit->run($test,$expected_result,$test_name);
    }
	
    public function testIsModulesOfThree()
    {
        $start_no=$end_no=3;
        $test=$this->printNumbers($start_no,$end_no);
        $expected_result='Linio';
        $test_name="Test Modules of three";
        echo $this->unit->run($test, $expected_result,$test_name);
    }
    
    public function testIsModulesOfFive()
    {
        $start_no=$end_no=5;
        $test=$this->printNumbers($start_no,$end_no);
        $expected_result='IT';
        $test_name="Test Modules of five";
        echo $this->unit->run($test, $expected_result,$test_name);
    }
    
    public function TestIsModulesOfThreeAndFive()
    {
        $start_no=$end_no=15;
        $test=$this->printNumbers($start_no,$end_no);
        $expected_result='Linianos';
        $test_name="Test Modules of three and five";
        echo $this->unit->run($test, $expected_result,$test_name);
    }
    
}
