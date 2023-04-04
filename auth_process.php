<?php 

    require_once("globals.php");
    require_once("db.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");
    require_once("models/Message.php");

    $message = new Message($BASE_URL)
    $type = filter_input(INPUT_POST, "type");

    if("type" === register) {

        $name =  $type = filter_input(INPUT_POST, "name");
        $lastname =  $type = filter_input(INPUT_POST, "lastname");
        $email =  $type = filter_input(INPUT_POST, "email");
        $password =  $type = filter_input(INPUT_POST, "password");
        $confirmpassword =  $type = filter_input(INPUT_POST, "confirmpassword");

        if($name && $lastname && $password && $email) {

        } else {
            $message->setMessage("Por favor, preencha todos os campos.", "error", "back")
        }

    } else if("type" === login) {

    }
