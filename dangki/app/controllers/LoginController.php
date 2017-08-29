<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
      $isPost=$this->request->isPost();

     if($isPost)
     {
	 
     	 $edUser=$this->request->getPost("edUser");
        
     	$edPassword=$this->request->getPost("edPassword");
         
     	if(!$edUser)
          {
          	$this->flashSession->error("Vui long nhap user");
          	return $this->response->redirect("Login/index");
          }
          else if(!$edPassword)
          {
     		$this->flashSession->error("Vui long nhap password");
     		return $this->response->redirect("Login/index");
     	   }

       

     	$test=Users::find("username='$edUser' and password='$edPassword'");
     	
     	// echo count($test);
     	// exit();
        if(count($test) >0)
        {
         $user=$test[0];
         $user->password="";
         $this->session->set('login',$user);
         return $this->response->redirect("index");
        	// $this->flashSession->success("Login thanh cong");
         //    return $this->response->redirect("login/index");


        }
        else
        {
         $this->flashSession->error("Khong login duoc");
         return $this->response->redirect("login/index");
        }
     }
     else
     {

     }

    }

}
