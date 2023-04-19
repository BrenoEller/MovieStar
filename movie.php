<?php 
    require_once("templates/header.php");
    require_once("dao/MovieDAO.php");
    require_once("models/Movie.php");

    $userDao = new UserDao($conn, $BASE_URL);
    $user = new User();
    
    $id = filter_input(INPUT_GET, "id");

    $movie;

    $movieDao = new MovieDAO($conn, $BASE_URL);

    if(empty($id)) {

        $message->setMessage("O filme não foi encontrado", "error", "index.php");
    } else {

        $movie = $movieDao->findById($id);

        if(!$movie) {

            $message->setMessage("O filme não foi encontrado", "error", "index.php");
        }
    }
?>