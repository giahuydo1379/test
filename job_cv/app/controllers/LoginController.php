<?php

use Phalcon\Http\Response;

class LoginController extends \Phalcon\Mvc\Controller {

    public function indexAction() {
        $isPost = $this->request->isPost();

        if ($isPost) {

            $edUser = $this->request->getPost("edUser");

            $edPassword = $this->request->getPost("edPassword");

            if (!$edUser) {
                $this->flashSession->error("Vui long nhap user");
                return $this->response->redirect("Login/index");
            } else if (!$edPassword) {
                $this->flashSession->error("Vui long nhap password");
                return $this->response->redirect("Login/index");
            }



            $test = Users::find("username='$edUser' and password='$edPassword'");

            // echo count($test);
            // exit();
            if (count($test) > 0) {
                $user = $test[0];
                $user->password = "";
                $this->session->set('login', $user);
                return $this->response->redirect("index");
                // $this->flashSession->success("Login thanh cong");
                //    return $this->response->redirect("login/index");
            } else {
                $this->flashSession->error("Khong login duoc");
                return $this->response->redirect("login/index");
            }
        } else {
            
        }
    }

    public function loginAction() {
        //bt về nhà: làm layout đẹp
        //làm pagin trong trang main
        //mỗi trang có 5
        // echo 'hello';
        $isPost = $this->request->isPost();
        $isGet = $this->request->isGet();

        if ($isPost) {

            $user = $this->request->getPost("username");

            $password = $this->request->getPost("password");

            if (!$user) {
                $this->flashSession->error("Vui long nhap user");
                //return $this->response->redirect("Login/index");
                echo 'fail';
            } else if (!$password) {
                $this->flashSession->error("Vui long nhap password");
                //return $this->response->redirect("Login/index");
            }



            $test = Users::find("username='$user' and password='$password'");

            // echo count($test);
            // exit();
            if (count($test) > 0) {
                $user = $test[0];
                $user->password = "";
                //  $this->session->set('login',$user);
                // return $this->response->redirect("index");
                // $this->flashSession->success("Login thanh cong");
                //    return $this->response->redirect("login/index");
                echo 'success';
            } else {
                $this->flashSession->error("Khong login duoc");
                //  return $this->response->redirect("login/index");
                echo 'fail';
            }
        } else {
            
        }
        exit;
    }

    public function apiAction() {
        $response = new Response();
        $param = $this->request->getJsonrawBody();
        // echo json_encode($param );

        $username = $param->username;
        // echo 
        $password = $param->password;





        $test = Users::find("username='$username' and password='$password'");

        // echo count($test);
        // exit();
        if (count($test) > 0) {
            $user = $test[0];
            $user->password = "";
            //  $this->session->set('login',$user);
            // return $this->response->redirect("index");
            // $this->flashSession->success("Login thanh cong");
            //    return $this->response->redirect("login/index");
            // echo 'success';
            $data = [
                'status' => 'ok',
                'user' => $user,
            ];
            $response->setJsonContent($data);
            return $response;
        } else {
            $this->flashSession->error("Khong login duoc");
            //  return $this->response->redirect("login/index");
           // echo 'fail';
             $data = [
                'status' => 'error',
                'user' => $username,
            ];
              $response->setJsonContent($data);
            return $response;
        }

        exit;
    }

}

///tìm micro service
