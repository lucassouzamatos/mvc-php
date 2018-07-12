<?php

namespace View;

class ViewManager {

    public function renderView($view) {
        return require_once $view;
    }

}