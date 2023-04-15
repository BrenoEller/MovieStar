<?php

    require_once("models/Movie.php");
    require_once("models/Message.php");

    class MovieDAO implements MovieDAOinterface {

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildMovie($data) {
            
            $user = new Movie();
      
            $movie->id = $data["id"];
            $movie->title = $data["title"];
            $movie->description = $data["description"];
            $movie->image = $data["image"];
            $movie->trailer = $data["trailer"];
            $movie->category = $data["category"];
            $movie->length = $data["length"];
            $movie->users_id = $data["users_id"];
      
            return $user;
        }
        public function findAll() {

        }
        public function getLatestMovies() {

        }
        public function getMoviesByCategory($category) {

        }
        public function getMoviesByUserId($id) {

        }
        public function findById($id) {

        }
        public function findByTitle($title) {

        }
        public function create(Movie $movie) {

            $stmt = $this->conn->prepare("INSERT INTO movies (
                title, description, image, trailer, category, lenght, users_id
                ) VALUES (
                    :title, :description, :image, :trailer, :category, :lenght, :users_id
                )");

                $stmt->bindParam(":title", $movie->title);
                $stmt->bindParam(":description", $movie->description);
                $stmt->bindParam(":image", $movie->image);
                $stmt->bindParam(":trailer", $movie->trailer);
                $stmt->bindParam(":category", $movie->category);
                $stmt->bindParam(":lenght", $movie->length);
                $stmt->bindParam(":users_id", $movie->users_id);

                $stmt->execute();

                $this->message->setMessage("Filme adicionado!", "success", "index.php");
        }
        public function update(Movie $movie) {

        }
        public function destroy($id) {

        }
    }