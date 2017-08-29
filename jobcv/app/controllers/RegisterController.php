<?php
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;
class RegisterController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		$isPost = $this->request->isPost();
		if($isPost){
			$firstName = $this->request->getPost('idFirstName');
			if(!$firstName){
				$this->flashSession->warning("Inser First Name");
				return $this->response->redirect('\register');
			}

			//$this->view->setVar('first',$firstName);
			
			$lastName = $this->request->getPost('idLastName');
			//$this->view->setVar('last',$lastName);
			if(!$lastName){
				$this->flashSession->warning('Insert Last Name');
				return $this->response->redirect('\register');
			}

			$user = $this->request->getPost('idUsers');
			//$this->view->setVar('users',$user);
			if(!$user){
				$this->flashSession->warning('Insert Users');
				return $this->response->redirect('\register');
			}

			$password = $this->request->getPost('idPass');
			//$this->view->setVar('pass',$password);
			if(!$password){
				$this->flashSession->warning('Insert Password');
				return $this->response->redirect('\register');
			}

			$users = new Users();
			$users->firstName = $firstName;
			$users->lasttName = $lastName;
			$users->username = $user;
			$users->password = $password;

			// $check = Users::find("user = username");
			// if($check){
			// 	$this->flashSession->warning('Error Username');
			// }

			$query = Users::find("username='$user'");
			if(count($query)>0){
				$this->flashSession->error("Please insert username again!");
			}

			$str = "";
			if($users->save() === false){
				 // echo "Error";
			// 	return $this->dispatcher->forward(
			// 		[
			// 		"controller" => "register",
			// 		"action"=> "index",
			// 		]
			// 		);
			// }
			//	return $this->response->riderect('\index\index');
				$messages = $users->getMassages();
				foreach ($messages as $message) {
					$str = $str.$message;
				}
				$this->flashSession->success($str);

			}
			else{
				return $this->flash->success("MTQ");
				return $this->dispatcher->forward(
					[
					"controller" => "register",
					"action"=> "save",
					]
					);
			}
			exit;
		}
	}

	public function saveAction(){

		
		$this->flashSession->success("MTQ");
		return $this->dispatcher->forward(
			[
			"controller" => "register",
			"action"=> "index",
			]
			);
		exit;
	}
}