<?php 
    require_once("templates/header.php")
?>

    <div id="main-container" class="container-fluid">
        <h2 class="section-title">Novos filmes</h2>
        <p class="section-description">Veja as críticas dos últimos filmes adicionados !</p>
        <div class="movies-container">
            <div class="card movie-card">
                <div class="card-img-top" style="background-image: url('<?= $BASE_URL ?>imagens/movies/movie_cover.jpg');"></div>
                <div class="card-body">
                    <p class="card-rating">
                        <i class="fas fa-star"></i>
                        <span class="rating">9</span>
                    </p>
                    <h5 class="title">
                        <a href="#">Título do filme</a>
                    </h5>
                    <a href="#" class="btn btn-primary rate-btn">Avaliar</a>
                    <a href="#" class="btn btn-primary card-btn">Conhecer</a>
                </div>
            </div>
        </div>
    </div>

<?php 
    require_once("templates/footer.php")
?>