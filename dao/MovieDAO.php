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
      
            $user->id = $data["id"];
            $user->title = $data["title"];
            $user->description = $data["description"];
            $user->image = $data["image"];
            $user->trailer = $data["trailer"];
            $user->category = $data["category"];
            $user->lenght = $data["lenght"];
            $user->users_id = $data["users_id"];
      
            return $user;
        }
        public function findAll() {

        }
        public function getLatestMovies() {

            $movies = [];

            $stmt = $this->conn->query("SELECT * FROM movies ORDER BY id DESC");

            $stmt->execute();

            if($stmt->rowCount() > 0) {

                $moviesArray = $stmt->fetchAll();

                foreach($moviesArray as $movie) {
                    $movies[] = $this->buildMovie($movie);
                }
            }

            return $movies;
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