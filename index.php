<?php 
    require_once("templates/header.php");
    require_once("dao/MovieDAO.php");
    
    $movieDAO = new MovieDAO($conn, $BASE_URL);

    $latestMovies = $movieDAO->getLatestMovies();
?>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Novos filmes</h2>
        <p class="section-description">Veja as críticas dos últimos filmes adicionados !</p>
        <div class="movies-container">
            <?php foreach($latestMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>        
        </div>
    </div>

<?php 
    require_once("templates/footer.php")
?>