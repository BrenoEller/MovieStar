<?php

    require_once("models/Review.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO")

    class ReviewDao implements interface ReviewDAOInterface {

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildReview($data){

            $reviewObject = new Review();
            $reviewObject->rating = $data["rating"];
            $reviewObject->review = $data["review"];
            $reviewObject->users_id = $data["users_id"];
            $reviewObject->users_movies = $data["users_movies"];
        }

        public function create(Review $review){

        }

        public function getMoviesReview($id){

        } 

        public function hasAlredyReviewed($id, $userId){

        }

        public function getRatings($id){

        }

    }