<?php
namespace Address\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

/**
* ControllerBase
*
* @property \Address\Auth\Auth auth
*/

class ControllerBase extends Controller
{
    /**
    * Execute before the router so we can determine if this is a private controller,
    * and must be authenticated, or a public controller that is open to all.
    *
    * @param Dispatcher $dispatcher
    * @return boolean
    */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $controllerName = $dispatcher->getControllerName();

        // Only check permissions on private controllers
        if ($this->acl->isPrivate($controllerName)) {

            // Get the current identity
            $identity = $this->auth->getIdentity();

            // case: no identity
            if (!is_array($identity)) {
                $this->flash->notice('You don\'t have access');


                $dispatcher->forward([
                    'controller' => 'index',
                    'action' => 'index'
                ]);
                return false;
            }

            // Check if the user have permission to the current option
            if (!$this->acl->isAllowed($identity['profile'], $controllerName, $actionName)) {

                $this->flash->notice('You don\'t have access to this page');

                if ($this->acl->isAllowed($identity['profile'], $controllerName, 'index')) {
                    $dispatcher->forward([
                        'controller' => $controllerName,
                        'action' => 'index'
                    ]);
                } else {
                    $dispatcher->forward([
                        'controller' => 'user_control',
                        'action' => 'index'
                    ]);
                }
                return false;
            }
        }
    }
}
