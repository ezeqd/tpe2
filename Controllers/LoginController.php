<?php

class LoginController {
    private $view;
    function __construct() {
        $this->view = new LoginView();
    }
}