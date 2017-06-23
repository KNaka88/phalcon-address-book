<?php
namespace Address\Auth;
use Phalcon\Mvc\User\Component;
use Address\Models\Users;
use Address\Models\SuccessLogins;
use Address\Models\RememberTokens;

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

        // if user checked 'remember me', run this function
        if (isset($credentials['remember'])) {
            $this->createRememberEnvironment($user);
        }

        // set auth-identity for session
        $this->session->set('auth-identity', [
            'id' => $user->id,
            'name' => $user->name,
            'profile' => $user->profile->name
        ]);
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
    }

    /**
     * Creates the remember me environment settings the related cookies and generating tokens
     *
     * @param \Address\Models\Users $user
     */
     public function createRememberEnvironment(Users $user)
     {
        $userAgent = $this->request->getUserAgent();
        $token = md5($user->email . $user->password . $userAgent);
        $remember = new RememberTokens();
        $remember->usersId = $user->id;
        $remember->token = $token;
        $remember->userAgent = $userAgent;
        if ($remember->save()) {
            $expire = time()  + 86400 * 8;
            $this->cookies->set('RMU', $user->id, $expire);
            $this->cookies->set('RMT', $token, $expire);
        }
     }


     /**
      * Check if the session has a remember me cookie
      *
      * @return boolean
      */
     public function hasRememberMe()
     {
         return $this->cookies->has('RMU');
     }


    /**
    * Logs on using the information in the cookies
    *
    * @return \Phalcon\Http\Response
    */

    public function loginWithRememberMe()
    {
        $userId = $this->cookies->get('RMU')->getValue();
        $cookieToken = $this->cookies->get('RMT')->getValue();

        $user = Users::findFirstById($userId);
        if($user) {
            $userAgent = $this->request->getUserAgent();
            $token = md5($user->email . $user->password . $userAgent);

            if($cookieToken == $token) {
                $remember = RememberTokens::findFirst([
                    'userId = ?0 AND token = ?1',
                    'bind' => [
                        $user->id,
                        $token
                    ]
                ]);
                if($remember) {

                    if((time() - (86400 * 8)) < $remember->createdAt) {

                        $this->checkUserFlags($user);

                        $this->session->set('auth-identity', [
                            'id' => $user->id,
                            'name' => $user->name,
                            'profile' => $user->profile->name
                        ]);

                        $this->saveSuccessLogin($user);
                        return $this->response->redirect('users');
                    }
                }
            }
        }

        // When user was not found, navigate to login page again
        $this->cookies->get('RMU')->delete();
        $this->cookies->get('RMT')->delete();

        return $this->response->redirect('session/login');
    }


}
