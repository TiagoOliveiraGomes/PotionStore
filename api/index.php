<?php
session_start();
require 'conection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Potion Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Poções
                            <a href="potion-create.php" class="btn btn-primary float-end">Adicionar Poção</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Miniatura</th>
                                    <th>Nome</th>
                                    <th>Efeito</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM POTIONS';
                                $potions = mysqli_query($conection, $sql);
                                if(mysqli_num_rows($potions) > 0){
                                    foreach($potions as $potions){
                                        
                                ?>
                                <tr>
                                    <td><?=$potions['id']?></td>
                                    <td >
                                        <img 
                                            src="<?=$potions['image_path'];?>" 
                                            alt="Imagem da poção" 
                                            class="rounded-circle center-block" 
                                            style="max-width: 100%; height: 70px;">
                                    </td>
                                    <td><?=$potions['name']?></td>
                                    <td><?=$potions['effect']?></td>
                                    <td>
                                        <a href="potion-view.php?id=<?=$potions['id']?>" class="btn btn-secondary btn-sm">Vizualizar</a>
                                        <a href="potion-edit.php?id=<?=$potions['id']?>" class="btn btn-success btn-sm">Editar</a>
                                        <form action="actions.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Temcerteza que deseja excluir?')" type="submit" name="delete_potion" value="<?=$potions['id']?>" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo '<h5>Nenhuma poção encontrada </h5>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>