<?php

    require_once("models/Review.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    class ReviewDao implements ReviewDAOInterface {

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

            
            $stmt = $this->conn->prepare("INSERT INTO reviews (
                rating, review, movies_id, users_id
                ) VALUES (
                    :rating, :review, :movies_id, :users_id
                )");

                $stmt->bindParam(":review", $review->review);
                $stmt->bindParam(":rating", $review->rating);
                $stmt->bindParam(":movies_id", $review->movies_id);
                $stmt->bindParam(":users_id", $review->users_id);

                $stmt->execute();

                $this->message->setMessage("Crítica adicionada!", "success", "index.php");
        }

        public function getMoviesReview($id){

        } 

        public function hasAlredyReviewed($id, $userId){

        }

        public function getRatings($id){

        }

    }