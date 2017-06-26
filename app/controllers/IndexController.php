<?php
namespace Address\Controllers;

use Address\Forms\UsersForm;
use Address\Models\Users;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
        $this->view->usersForm = new UsersForm;
    }

    public function newAction()
    {

    }

    public function saveAction()
    {
        $form = new UsersForm(null);

        if(!$this->request->isPost()){
          // forward the execution flow to another controller/action
            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'new'
            ]);
            return;
            // https://docs.phalconphp.com/en/3.0.2/reference/dispatching.html#forwarding-to-other-actions
        }

        // Check input is valid form
        if($form->isValid($this->request->getPost()) == false) {
            //If there was invalid input, show error
            foreach ($form->getMessages() as $message) {
              $this->flash->error($message);
            }
        } else {
            // Save to database
            $user = new Users();
            $user->firstName = $this->request->getPost("firstName");
            $user->lastName = $this->request->getPost("lastName");
            $user->email = $this->request->getPost("email");
            $user->contactNumber = intval($this->request->getPost("contactNumber"));
            $user->password = $this->security->hash($this->request->getPost("password"));
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
                'controller' => 'users',
                'action' => 'index'
            ]);

        }
    }
}
