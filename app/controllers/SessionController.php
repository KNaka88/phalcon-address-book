<?php
namespace Address\Controllers;

use Address\Forms\LoginForm;
use Address\Models\Users;
use Address\Auth\Exception as AuthException;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Criteria;


class SessionController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->setTemplateBefore('public');
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
                    $this->auth->check([
                        'email' => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                        'remember' => $this->request->getPost('remember')
                    ]);
                    // $email    = $this->request->getPost('email');
                    // $password = $this->request->getPost('password');
                    // $user = Users::findFirstByEmail($email);
                    //
                    // if ($user) {
                    //     if ($this->security->checkHash($password, $user->password)) {
                    //         // The password is valid
                    //         echo "<br>password valid";
                    //     }
                    // } else {
                    //     // To protect against timing attacks. Regardless of whether a user
                    //     // exists or not, the script will take roughly the same amount as
                    //     // it will always be computing a hash.
                    //     $this->security->hash(rand());
                    // }
                    // // The validation has failed
                }
            }
        } catch (AuthException $e) {
            $this->flash->error($e->getMessage());
        }
    }
}
