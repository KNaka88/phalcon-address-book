<?php
namespace Address\Controllers;

use Address\Forms\LoginForm;
use Address\Models\Users;
use Address\Auth\Exception as AuthException;
use Phalcon\Mvc\Model\Criteria;


class SessionController extends ControllerBase
{

    public function initialize()
    {
        $this->view->setTemplateBefore('public');
    }

    public function indexAction()
    {
        $this->view->loginForm = new LoginForm;
    }


    public function loginAction()
    {
        $form = new LoginForm();

        try {
            if(!$this->request->isPost()){
                if($this->auth->hasRememberMe()){
                    return $this->auth->loginWithRememberMe();
                }
            } else {
                // Cbeck input is valid
                if($form->isValid($this->request->getPost()) == false) {
                    //If there was invalid input, show error
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    // if user already logged in and has auth,
                    $this->auth->check([
                        'email' => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                        'remember' => $this->request->getPost('remember')
                    ]);
                    return $this->response->redirect('users');
                }
            }
        } catch (AuthException $e) {
            $this->flash->error($e->getMessage());
        }

        $this->view->form = $form;
    }


    public function logoutAction()
    {
        $this->auth->remove();
        return $this->response->redirect('index');
    }
}
