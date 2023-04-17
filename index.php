<?php 
    require_once("templates/header.php");
    require_once("dao/MovieDAO.php");
    
    $movieDAO = new MovieDAO($conn, $BASE_URL);

    $latestMovies = $movieDAO->getLatestMovies();

    $infantilMovies = $movieDAO->getMoviesByCategory("Infantil");

    $fictionMovies = $movieDAO->getMoviesByCategory("Fantasia/ficção");

    $horrorMovies = $movieDAO->getMoviesByCategory("Terror");

    $romanceMovies = $movieDAO->getMoviesByCategory("Romance");
    
    $suspenseMovies = $movieDAO->getMoviesByCategory("Suspense");

    $dramaMovies = $movieDAO->getMoviesByCategory("Drama");

    $acaoMovies = $movieDAO->getMoviesByCategory("Ação");

    $comediaMovies = $movieDAO->getMoviesByCategory("Comédia");

    $corridaMovies = $movieDAO->getMoviesByCategory("Corrida");
?>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Últimos filmes</h2>
        <p class="section-description">Veja as críticas dos últimos filmes adicionados!</p>
        <div class="movies-container">
            <?php foreach($latestMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Infantis</h2>
        <div class="movies-container">
            <?php foreach($infantilMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($infantilMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Ficção/Fantasia</h2>
        <div class="movies-container">
            <?php foreach($fictionMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($fictionMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Terror</h2>
        <div class="movies-container">
            <?php foreach($horrorMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($horrorMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Romance</h2>
        <div class="movies-container">
            <?php foreach($romanceMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($romanceMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Drama</h2>
        <div class="movies-container">
            <?php foreach($dramaMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($dramaMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Suspense</h2>
        <div class="movies-container">
            <?php foreach($suspenseMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($suspenseMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Suspense</h2>
        <div class="movies-container">
            <?php foreach($acaoMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($acaoMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Suspense</h2>
        <div class="movies-container">
            <?php foreach($acaoMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($acaoMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Comédia</h2>
        <div class="movies-container">
            <?php foreach($comediaMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($comediaMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Filmes de Carros</h2>
        <div class="movies-container">
            <?php foreach($corridaMovies as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($corridaMovies) === 0): ?>
                <p class="empty-list">Ainda não há filmes desta categoria.</p>
            <?php endif; ?>
        </div>
    </div>


<?php 
    require_once("templates/footer.php")
?>