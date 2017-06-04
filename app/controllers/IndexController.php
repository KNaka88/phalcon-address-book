<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    }

    public function saveAction()
    {
        if(!$this->request->isPost()){
          // forward the execution flow to another controller/action
            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);

            return;
            // https://docs.phalconphp.com/en/3.0.2/reference/dispatching.html#forwarding-to-other-actions
        }  
    }


}
