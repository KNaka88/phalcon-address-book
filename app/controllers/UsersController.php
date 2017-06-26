<?php
namespace Address\Controllers;

use Address\Forms\SearchForm;
use Address\Models\Users;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UsersController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateBefore('private');
    }

    public function indexAction()
    {
        $this->view->searchForm = new SearchForm;
    }

    public function searchAction()
    {
        $form = new SearchForm(null);
        $numberPage = 1;
        if ($this->request->isPost()){
            $query = Criteria::fromInput($this->di, 'Address\Models\Users', $this->request->getPost());
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }


        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $users = Users::find($parameters);

        if(count($users) == 0) {
            $this->flash->notice("no results");

            $this->dispatcher->forward([
                "controller" => "users",
                "action" => "index"
            ]);
            return;
        }

        $paginator = new Paginator([
            'data' => $users,
            'limit' => 5,
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
                  'controller' => 'users',
                  'action' => 'index'
              ]);

              return;
            }
        }

        $this->view->id = $user->id;
        $this->tag->setDefault("id", $user->id);
        $this->tag->setDefault("firstName", $user->firstName);
        $this->tag->setDefault("lastName", $user->lastName);
        $this->tag->setDefault("email", $user->email);
        $this->tag->setDefault("contactNumber", $user->contactNumber);
    }

    public function updateAction()
    {
        if(!$this->request->isPost()) {
          $this->dispatcher->forward([
              'controller' => 'users',
              'action' => 'index'
          ]);
          return;
        }

        $id = $this->request->getPost("id");
        $user = Users::findFirstByid($id);

        if(!$user) {
            $this->flash->error("user does not exist" . $id);

            $this->dispatcher->forward([
                'controller' => 'users',
                'action' => 'index'
            ]);
            return;
        }

        $user->firstName = $this->request->getPost("firstName");
        $user->lastName = $this->request->getPost("lastName");
        $user->email = $this->request->getPost("email");
        $user->contactNumber = $this->request->getPost("contactNumber");

        if(!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'users',
                'action' => 'edit',
                'params' => [$user->id]
            ]);
            return;
        }

        $this->flash->success("user was updated successfully");

        $this->dispatcher->forward([
          'controller' => 'users',
          'action' => 'index'
        ]);
    }

    public function deleteAction($id)
    {
        $user = Users::findFirstByid($id);
        if(!$user) {
            $this->flash->error("user was not found");

            $this->dispatcher->forward([
                'controller' => 'users',
                'action' => 'index'
            ]);
            return;
        }

        if(!$user->delete()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => 'users',
                'action' => 'index'
            ]);

            return;
        }

        $this->flash->success("user was deleted successfully");

        $this->dispatcher->forward([
            'controller' => 'users',
            'action' => 'index'
        ]);
    }
}
