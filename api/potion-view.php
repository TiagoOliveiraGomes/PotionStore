<?php
require 'conection.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Potion - view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vizualizar poção
                            <a href="index.php" class="btn btn-danger float-end">voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])){
                                $potion_id = mysqli_real_escape_string($conection, $_GET['id']);
                                $sql = "SELECT * FROM POTIONS WHERE id ='$potion_id'";
                                $query = mysqli_query($conection, $sql);

                                if(mysqli_num_rows($query) > 0) {
                                    $potion = mysqli_fetch_array($query);
                        ?>
                        <div class="mb-3">
                            <div>
                                <img 
                                    src="<?=$potion['image_path'];?>" 
                                    alt="Imagem da poção" 
                                    class="rounded" 
                                    style="max-width: 100%; height: 300px;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Nome</label>
                            <p class="form-control">
                                <?=$potion['name'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="">Efeito</label>
                            <p class="form-control">
                                <?=$potion['effect'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="">Preço</label>
                            <p class="form-control">
                                <?=$potion['price'];?>
                            </p>
                        </div>
                        <?php
                            }else {
                                echo "<h5?>Poção não encontrada </h5>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>