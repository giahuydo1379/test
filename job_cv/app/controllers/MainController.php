<?php

class MainController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        if ($this->session->has("login")) {
            
        } else {
            return $this->response->redirect("Login");
        }
    }

}

