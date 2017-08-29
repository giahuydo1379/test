<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }
     public function edfAction()
    {
         $arrinfo = [
             'name' => 'student',
             'age'  => '24',
             'hair' => 'red'
         ];
         $this->view->info =$arrinfo;
    }
    public function ghkAction()
    {
        
    }

}

