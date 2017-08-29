<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
       if($this->session->has("login"))
        {
           $user=$this->session->get('login');
           $this->view->setVar("user", $user);
        }
        else
            
        	 return $this->response->redirect("login");
        	
    }

}

