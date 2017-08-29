<?php
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;
class LoginController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		$isPost = $this->request->isPost();
		if($isPost){
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
			$users->username = $user;
			$users->password = $password;

			$queryUser = Users::find("username='$user'");
			$queryPass = Users::find("password='$password'");	
			if(count($queryUser) > 0 && count($queryPass) > 0){
			//	$this->flashSession->success("Login success!");
				$this->session->set('login',$queryUser[0]->username);
				return $this->response->redirect('\index');
			}
			else{
				$this->flashSession->error("Login error!");
			}
		}

	}
}

