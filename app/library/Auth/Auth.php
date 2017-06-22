<?php
namespace Address\Auth;
use Phalcon\Mvc\User\Component;
use Address\Models\Users;
use Address\Models\SuccessLogins;

class Auth extends Component
{
    /**
     * Checks the user credentials
     *
     * @param array $credentials
     * @return boolean
     * @throws Exception
     */

     public function check($credentials)
     {
         // Check if the user exist
         $user = Users::findFirstByEmail($credentials['email']);
         if($user == false) {
             /* Implements login throttling
             * Reduces the effectiveness of brute force attacks */
             throw new Exception('Wrong email/password combination');
            //  $this->registerUserThrottling(0)
         }

         // Check the password
         if (!$this->security->checkHash($credentials['password'], $user->password)) {
            // $this->registerUserThrotting($user->id);
            throw new Exception('Wrong email/password combination');
         }

         // Register the successful login
         $this->saveSuccessLogin($user);
     }

     /**
      * Creates the remember me environment settings the related cookies and generating tokens
      *
      * @param \Vokuro\Models\Users $user
      * @throws Exception
      */
    public function saveSuccessLogin($user)
    {
        $successLogin = new SuccessLogins();
        $successLogin->usersId = $user->id;
        $successLogin->ipAddress = $this->request->getClientAddress();
        $successLogin->userAgent = $this->request->getUserAgent();
        if (!$successLogin->save()) {
            $messages = $successLogin->getMessages();
            throw new Exception($messages[0]);
        }
        echo "if no error happend, true!";
    }
}
