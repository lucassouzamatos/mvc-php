<?php
namespace Controller;

use Container\Container;
use View\ViewManager;

class Controller {
    const VIEWS_DIR = 'src/View/';

    private $container;
    private $viewManager;

    public function __construct() {
        $this->container = new Container();
        $this->viewManager = new ViewManager();
    }

    public function getService($service) {
        return $this->container->getService($service);
    }

    public function renderize($view) {
        if (is_file(self::VIEWS_DIR . $view . '.php')) {
            return $this->viewManager->renderView(self::VIEWS_DIR . $view . '.php');
        }

        return $this->viewManager->renderView(self::VIEWS_DIR . $view);

    }


}