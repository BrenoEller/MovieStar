<?php

    require_once("models/Movie.php");
    require_once("models/Message.php");
    require_once("dao/ReviewDAO.php");

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
      
            $reviewDao = new ReviewDao($this->conn, $this->url);

            $rating = $reviewDao->getRatings($user->id);

            $user->rating = $rating;

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
           
            $movies = [];

            $stmt = $this->conn->prepare("SELECT * FROM movies
                     WHERE category = :category
                     ORDER BY id DESC");

            $stmt->bindParam(":category", $category);

            $stmt->execute();

            if($stmt->rowCount() > 0) {

                $moviesArray = $stmt->fetchAll();

                foreach($moviesArray as $movie) {
                    $movies[] = $this->buildMovie($movie);
                }
            }

            return $movies;
        }

        public function getMoviesByUserId($id) {

            $movies = [];

            $stmt = $this->conn->prepare("SELECT * FROM movies
                     WHERE users_id = :users_id
                     ORDER BY id DESC");

            $stmt->bindParam(":users_id", $id);

            $stmt->execute();

            if($stmt->rowCount() > 0) {

                $moviesArray = $stmt->fetchAll();

                foreach($moviesArray as $movie) {
                    $movies[] = $this->buildMovie($movie);
                }
            }

            return $movies;
        }

        public function findById($id) {

            $movie = [];

            $stmt = $this->conn->prepare("SELECT * FROM movies
                     WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            if($stmt->rowCount() > 0) {

                $movieData = $stmt->fetch();

                $movie = $this->buildMovie($movieData);

                return $movie;

            } else {

                return false;
            }

        }

        public function findByTitle($title) {

            $movies = [];

            $stmt = $this->conn->prepare("SELECT * FROM movies
                     WHERE title LIKE :title
                     ORDER BY id DESC");

            $stmt->bindValue(":title", '%'.$title.'%');

            $stmt->execute();

            if($stmt->rowCount() > 0) {

                $moviesArray = $stmt->fetchAll();

                foreach($moviesArray as $movie) {
                    $movies[] = $this->buildMovie($movie);
                }
            }

            return $movies;
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

            $stmt = $this->conn->prepare("UPDATE movies SET
                title = :title,
                image = :image,
                description = :description,
                trailer = :trailer,
                category = :category,
                lenght = :length
                WHERE id = :id");

                $stmt->bindParam(":title", $movie->title);
                $stmt->bindParam(":description", $movie->description);
                $stmt->bindParam(":image", $movie->image);
                $stmt->bindParam(":trailer", $movie->trailer);
                $stmt->bindParam(":category", $movie->category);
                $stmt->bindParam(":length", $movie->length);
                $stmt->bindParam(":id", $movie->id);

                $stmt->execute();

                $this->message->setMessage("Filme alterado com sucesso!.", "success", "dashboard.php");
        }

        public function destroy($id) {

            $stmt = $this->conn->prepare("DELETE FROM movies WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $this->message->setMessage("Filme removido.", "success", "dashboard.php");
        }
    }