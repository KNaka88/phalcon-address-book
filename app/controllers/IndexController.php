<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
      $this->persistent->parameters = null;
    }

    public function newAction()
    {

    }

    public function saveAction()
    {
        if(!$this->request->isPost()){
          // forward the execution flow to another controller/action
            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'new'
            ]);
            return;
            // https://docs.phalconphp.com/en/3.0.2/reference/dispatching.html#forwarding-to-other-actions
        }

        $user = new Users();
        $user->firstname = $this->request->getPost("firstName");
        $user->lastname = $this->request->getPost("lastName");
        $user->email = $this->request->getPost("email");
        $user->contactnumber = $this->request->getPost("contactnumber");

        if(!$user->save()) {
          //Case failed to save
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'index',
                'action' =>'index'
            ]);

            return;
        }

        $this->flash->success("address was created successfully");

        $this->dispatcher->forward([
            'controller' => 'index',
            'action' => 'index'
        ]);
    }

}
