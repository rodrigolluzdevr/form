<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-md-center align-items-center vh-100">
            <div class="col-md-9">
                <form action="<?php echo url_to('upload') ?>" method="post" enctype="multipart/form-data" class="">
                    <div class="mb-5">
                        <label for="nome" class="form-label">Nome Completo:</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="endereco" class="form-label">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <input type="file" name="userfile" class="form-control-file" required>
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </form>
                <?php if (session()->has('errors')) :?>
                    <span class="text text-danger"><?php echo session()->get('errors')['userfile']; ?></span>
                <?php endif; ?>
                <?php if (session()->has('uploaded')) :?>
                    <span class="text text-success"><?php echo session()->get('uploaded'); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>

