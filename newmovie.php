<?php 
    require_once("templates/header.php");
    require_once("dao/UserDAO.php");
    require_once("models/User.php");

    $userDao = new UserDao($conn, $BASE_URL);
    $user = new User();
    
    $userData = $userDao->verifyToken(true);
?>

    <div id="main-container" class="container-fluid">
        <div class="offset-md-4 col-md-4 new-movie-container">
            <h1 class="page-title">Adicionar Filme</h1>
            <p class="page-description">Adicione sua crítica</p>
            <form action="<?= $BASE_URL ?>movie_process.php" id="add-movie-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="create">
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do seu filme">
                </div>
                <div class="form-group">
                    <label for="image">Imagem:</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <div class="form-group">
                    <label for="length">Duração:</label>
                    <input type="text" class="form-control" id="length" name="length" placeholder="Digite a duração do filme">
                </div>
                <div class="form-group">
                    <label for="category">Categoria:</label>
                    <select type="text" class="form-control" id="category" name="category">
                        <option value="">Selecione</option>
                        <option value="Terror">Terror</option>
                        <option value="Ação">Ação</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Infantil">Infantil</option>
                        <option value="Drama">Drama</option>
                        <option value="Comédia">Comédia</option>
                        <option value="Fantasia/ficção">Fantasia/ficção</option>
                        <option value="Romance">Romance</option>
                        <option value="Corrida">Corrida</option>
                    <select/>
                </div>
                <div class="form-group">
                    <label for="trailer">Trailer:</label>
                    <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Insira o link do trailer">
                </div>
                <div class="form-group">
                    <label for="description">Descrição do filme:</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Digite a descrição do filme"></textarea>
                </div>
                <input type="submit" class="btn card-btn" value="Adicionar filme">
            </form>
        </div>
    </div>

<?php 
    require_once("templates/footer.php")
?>