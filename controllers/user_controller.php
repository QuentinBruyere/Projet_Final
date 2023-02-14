<?php

require "./managers/user_manager.php";

class UserController {

    public function getArgonauts() {
        $userManager = new UserManager;
        $argonautList = $userManager -> getArgonauts();

        return $argonautList;
    }

    public function register() {
        $name = $_POST["name"];

        $userManager = new UserManager;
        $register = $userManager -> createNewArgonaut($name);

        header('Location: http://wcstest/');
        exit;
    }
}

?>