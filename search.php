<?php 
    require_once("templates/header.php");
    require_once("dao/MovieDAO.php");
    
    $movieDAO = new MovieDAO($conn, $BASE_URL);
    $q = filter_input(INPUT_GET, "q");
    $movieSearch = $movieDAO->findByTitle($q);;
?>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Sua busca sobre: <span id="search-result"><?= $q ?></span></h2>
        <div class="movies-container">
            <?php foreach($movieSearch as $movies): ?>
               <?php require("templates/movie_card.php"); ?>
            <?php endforeach; ?>
            <?php if(count($movieSearch) === 0 ): ?>
                <p class="empty-list">Não há filmes relacionados a sua busca.</p>
            <?php endif; ?>
        </div>
    </div>

    


<?php 
    require_once("templates/footer.php")
?>