<?php 

    require_once("globals.php");
    require_once("db.php");
    require_once("models/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);

    $flassMessage = $message->getMessage();

    if(!empty($flassMessage["msg"])) {
        $message->clearMessage();
    }

    $userDAO = new UserDAO($conn, $BASE_URL);

    $userData = $userDAO->verifyToken(false);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieStar</title>

    <link href="<?= $BASE_URL ?>imagens/moviestar.ico" rel="short icon" >

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
</head>
<body>

<header>
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="<?= $BASE_URL ?>" class="navbar-brand">
                    <img src="<?= $BASE_URL ?>imagens/logo.svg" alt="MovieStar" id="logo">
                    <span id="moviestar-title">MovieStar</span>
                </a>
                

                <form action="<?= $BASE_URL ?>search.php" method="GET" id="search-form" class="d-flex" role="search">
                        <input type="text" name="q" id="search" class="form-control me-2" type="search" placeholder="Buscar Filmes" aria-label="Search">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if($userData): ?>
                            <li class="nav-item">
                                <a href="<?= $BASE_URL ?>newmovie.php" class="nav-link gap-flex"> <i class="far fa-plus-square"></i>Incluir filme</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link">Meus filmes</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold"><?= $userData->name ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $BASE_URL ?>logout.php" class="nav-link">Sair</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= $BASE_URL ?>auth.php" class="nav-link"> Entrar / Cadastrar</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                </div>
            </div>
        </nav>
    
<?php if(!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
      <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
    </div>
<?php endif; ?>