<?php
namespace Address\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->setTemplateBefore('public');
    }
}
