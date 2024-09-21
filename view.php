<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unichaves - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <style>
        * {
        margin: 0;
        padding: 0;
    }

    body {
        width: 100%;
        height: 100%;
    }
    footer {
        position: absolute;
        bottom: 0;
        height: 8vh;
    }
    </style>
</head>
<body>
<main>
    <div class="container" style="text-align: center;">
        <img src="../uploads/images/logo.png" class="img-fluid p-3" alt="chave desenho" width="25%" height="42%">
        <form method="POST" action="" name="login_form" id="login_form">
            <div class="col-12 w-50 mt-5" style="text-align: left; margin: auto">
                <h6>CPF:</h6>
                <input class="form-control" type="text" name="username" id="username">
            </div>
            <div class="col-12 w-50 mt-3" style="text-align: left; margin: auto">
                <h6>Senha:</h6>
                <input class="form-control" type="password" name="senha" id="senha">
            </div>
            <button type="submit" class="btn btn-primary my-4" name="acessar" id="acessar">Acessar</button>
        </form>
    </div>
</main>
<footer id="footer" style="display: flex; justify-content: center; align-items: center; background-color: #e9ecef; width:100%; height: 4.3vh;">
    <h6>Desenvolvido por Matheus Augusto Guedes e Gustavo Cleber Pardim.</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
