<?php
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;
class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	if($this->session->has('login')){
    		$name = $this->session->get('login');
    		$this->view->setVar('myUser',$name);
    	}
    	else{
    		return $this->response->redirect("/login");
    	}
    }

}

