<?php 

    require_once("globals.php");
    require_once("db.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");
    require_once("models/Message.php");

    $message = new Message($BASE_URL);
    $userDAO = new UserDAO($conn, $BASE_URL);
    $type = filter_input(INPUT_POST, "type");

    if($type === "register") {

        $name = filter_input(INPUT_POST, "name");
        $lastname = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");
        

        if($name && $lastname && $password && $email) {

                if($password === $confirmpassword) {

                    if($userDAO->findByEmail($email) === false) {

                        echo "nenhum usuario foi encontrado";
                    } else {
                        $message->setMessage("Este email já está sendo utilizado.", "error", "back");
                    }
                } else{
                    $message->setMessage("As senhas não são iguais!", "error", "back");
                }

        } else{

            $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
        }

        } else if($type === "login") {

    } 

