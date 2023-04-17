<?php 
    require_once("templates/header.php");
    require_once("dao/MovieDAO.php");
    
    $movieDAO = new MovieDAO($conn, $BASE_URL);

    $latestMovies = $movieDAO->getLatestMovies();

    $infantilMovies = $movieDAO->getMoviesByCategory("Infantil");

    $fictionMovies = $movieDAO->getMoviesByCategory("Fantasia/ficção");
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

<?php 
    require_once("templates/footer.php")
?>