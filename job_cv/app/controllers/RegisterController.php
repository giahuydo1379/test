<?php
// use Users;
class RegisterController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
     $isPost=$this->request->isPost();

     if($isPost)
     {

     	$user=new Users();
    
     	$edFirstName=$this->request->getPost("edFirstName");
     	// echo "Firstname ". $edFirstName;
     	

     	$edLastName=$this->request->getPost("edLastName");
     	// echo " Lastname ".$edLastName;

     	$edUser=$this->request->getPost("edUser");

     	// echo " User ".$edUser;
        
     	$edPassword=$this->request->getPost("edPassword");
     	
     	// echo " Password ".$edPassword;
        
         // $this->flashSession->error("khong thanh cong");
          
          if(!$edFirstName)
          {
     		$this->flashSession->error("Vui long nhap First name");
     		return $this->response->redirect("register/index");
     	  }
          else if(!$edLastName)
          {
     		$this->flashSession->error("Vui long nhap Last name");
     		return $this->response->redirect("register/index");
     	  }
          else if(!$edUser)
          {
          	$this->flashSession->error("Vui long nhap user");
          	return $this->response->redirect("register/index");
          }
          else if(!$edPassword)
          {
     		$this->flashSession->error("Vui long nhap password");
     		return $this->response->redirect("register/index");
     	}

     	$user->username=$edUser;
     	$user->firstName=$edFirstName;
     	$user->lastName=$edLastName;
     	$user->password=$edPassword;
     	$test=Users::find("username='$edUser'");
        if(count($test)>0)
        {
        	$this->flashSession->error("Username đã tồn tại.Vui lòng nhập lại");
            return $this->response->redirect("register/index");
        }
        else if($user->save()===false)
        {
           
          foreach ($messages as $message)
           {

           	$error=$error.$message;
          	// $this->flash->error($message);
          }
          $this->flashSession->error("error");
          
          return $this->response->redirect("register/index");
           // $this->flash->success("Your information was stored correctly!");

        	
          // echo "F";
          // return $this->dispatcher->forward(
          // 	[
          // 	   "controller" =>"register",
          // 	   "action"     =>"index",
          // 	]
          // 	);
          
        }
        else
        {

        	$this->flashSession->success("thanh cong");
         // $this->flash->success("Your information was stored correctly!");
         return $this->response->redirect("register/index");
         // return $this->dispatcher->forward(
         //  	[
         //  	   "controller" =>"register",
         //  	   "action"     =>"index",
         //  	]
         //  	);
        // Forward to the index action
        
        
        }

        
    


     }
  
    }

    public function testAction(){
    	exit();
    }

    public function saveAction()
    {

    	 
           $this->flash->success("Sucess");
        	
          return $this->dispatcher->forward(
          	[
          	   "controller" =>"register",
          	   "action"     =>"test",
          	]
          	);
      
        
        }
    }


