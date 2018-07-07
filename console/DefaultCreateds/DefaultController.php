<?php
namespace src\Controller;

use core\Controller\Controller;

class DefaultController extends Controller {

    /**
     * (Route=/default)
     * (View="View/index.html)
     */
    public function indexAction()
    {
        echo 'DEFAULT!';
    }


}