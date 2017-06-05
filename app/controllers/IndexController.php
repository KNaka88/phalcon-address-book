<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
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
        $user->firstname = $this->request->getPost("firstname");
        $user->lastname = $this->request->getPost("lastname");
        $user->email = $this->request->getPost("email");
        $user->contactnumber = $this->request->getPost("contactnumber");

        echo $this->firstname;

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


    public function searchAction()
    {
          $numberPage = 1;
          if ($this->request->isPost()){
              $query = Criteria::fromInput($this->di, 'Users', $_POST);
              $this->persistent->parameters = $query->getParams();
          } else {
              $numberPage = $this->request->getQuery("page", "int");
          }

          $parameters = $this->persistent->parameters;
          if (!is_array($parameters)) {
              $parameters = [];
          }
          $parameters["older"] = "id";

          $users = Users::find($parameters);
          if(count($users) == 0) {
              $this->flash->notice("no results");

              $this->dispatcher->forward([
                  "controller" => "index",
                  "action" => "index"
              ]);
              return;
          }

          $paginator = new Paginator([
              'data' => $users,
              'limit' => 10,
              'page' => $numberPage
          ]);

          $this->view->page = $paginator->getPaginate();
    }

    public function editAction($id) {
        $user = Users::findFirstByid($id);

        if(!$this->request->isPost()){
            if(!$user) {
              $this->flash->error("user was not found");

              $this->dispatcher->forward([
                  'controller' => 'index',
                  'action' => 'index'
              ]);

              return;
            }
        }

        $this->view->id = $user->id;
        $this->tag->setDefault("id", $user->id);
        $this->tag->setDefault("firstname", $user->firstname);
        $this->tag->setDefault("lastname", $user->lastname);
        $this->tag->setDefault("email", $user->email);
        $this->tag->setDefault("contactnumber", $user->contactnumber);
    }

    public function updateAction()
    {
        if(!$this->request->isPost()) {
          $this->dispatcher->forward([
              'controller' => 'index',
              'action' => 'index'
          ]);
          return;
        }

        $id = $this->request->getPost("id");
        $user = Users::findFirstByid($id);

        if(!$user) {
            $this->flash->error("user does not exist" . $id);

            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);
            return;
        }

        $user->firstname = $this->request->getPost("firstname");
        $user->lastname = $this->request->getPost("lastname");
        $user->email = $this->request->getPost("email");
        $user->contactnumber = $this->request->getPost("contactnumber");

        if(!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'edit',
                'params' => [$user->id]
            ]);
            return;
        }

        $this->flash->success("user was updated successfully");

        $this->dispatcher->forward([
          'controller' => 'index',
          'action' => 'index'
        ]);
    }

    public function deleteAction($id)
    {
        $user = Users::findFirstByid($id);
        if(!$user) {
            $this->flash->error("user was not found");

            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);
            return;
        }

        if(!$user->delete()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);

            return;
        }

        $this->flash->success("user was deleted successfully");

        $this->dispatcher->forward([
            'controller' => 'index',
            'action' => 'index'
        ]);
    }
}
