<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Potion - create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Poção
                            <a href="index.php" class="btn btn-danger float-end">voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="actions.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Efeito</label>
                                <input type="text" name="efeito" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Ingredientes</label>
                                <input type="text" name="ingredientes" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Preço</label>
                                <input type="number" name="preco" step="0.01" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Imagem</label>
                                <input type="file" name="imagem" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create_potion" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>