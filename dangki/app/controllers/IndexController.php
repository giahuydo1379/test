<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        //kiểm tra xem session đặt tên login
       if($this->session->has("login"))
        {
           //nếu có login rồi thì đặt biến user....?
           $user=$this->session->get('login');
           //truyền biến user đó qua view
           $this->view->setVar("user", $user);
        }
        else
                //nếu ko có login thì quay lại trang login hay tên session login ở đây
        	 return $this->response->redirect("login");
        	
    }

}

