<?php
session_start();
require 'conection.php';


if(isset($_POST['create_potion'])){
    $nome = mysqli_real_escape_string($conection, trim($_POST['nome']));
    $efeito = mysqli_real_escape_string($conection, trim($_POST['efeito']));
    $ingredientes = mysqli_real_escape_string($conection, trim($_POST['ingredientes']));
    $preco = mysqli_real_escape_string($conection, trim($_POST['preco']));

    if ($nome === '' || $efeito === '' || $ingredientes === '' || $preco === '') {
    $_SESSION['message'] = 'Poção não criada: todos os campos são obrigatórios.';
    header('location: index.php');
    exit;
    }

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $file_tmp = $_FILES['imagem']['tmp_name'];
        $file_name = basename($_FILES['imagem']['name']);
        $target_file = $upload_dir . $file_name;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($file_tmp, $target_file)) {
            $image_path = $target_file;

            $sql = "INSERT INTO potions (name, effect, ingredients, price, image_path) 
                    VALUES ('$nome', '$efeito', '$ingredientes', '$preco', '$image_path')";

            if (mysqli_query($conection, $sql)) {
                $_SESSION['message'] = 'Poção criada com sucesso';
                header('location: index.php');
                exit;
            } else {
                $_SESSION['message'] = 'Erro ao criar a poção';
                header('location: index.php');
                exit;
            }
        } else {
            $_SESSION['message'] = 'Erro ao mover o arquivo de imagem';
            header('location: index.php');
            exit;
        }
    } else {
        $_SESSION['message'] = 'Erro no upload da imagem';
        header('location: index.php');
        exit;
    }
}


if(isset($_POST['update_potion'])){
    $potion_id = mysqli_real_escape_string($conection, $_POST['potion_id']);

    $nome = mysqli_real_escape_string($conection, trim($_POST['nome']));
    $efeito = mysqli_real_escape_string($conection, trim($_POST['efeito']));
    $ingredientes = mysqli_real_escape_string($conection, trim($_POST['ingredientes']));
    $preco = mysqli_real_escape_string($conection, trim($_POST['preco']));

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $file_tmp = $_FILES['imagem']['tmp_name'];
        $file_name = basename($_FILES['imagem']['name']);
        $target_file = $upload_dir . $file_name;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($file_tmp, $target_file)) {
            $image_path = $target_file;

            $sql = "UPDATE potions 
                    SET name='$nome', effect='$efeito', ingredients='$ingredientes', price='$preco', image_path='$image_path' 
                    WHERE id='$potion_id'";
        } else {
            $_SESSION['message'] = 'Erro ao mover o arquivo de imagem';
            header('location: index.php');
            exit;
        }
    } else {
        $sql = "UPDATE potions 
                SET name='$nome', effect='$efeito', ingredients='$ingredientes', price='$preco' 
                WHERE id='$potion_id'";
    }

    if (mysqli_query($conection, $sql)) {
        $_SESSION['message'] = 'Poção atualizada com sucesso';
        header('location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Erro ao atualizar a poção';
        header('location: index.php');
        exit;
    }

}

if(isset($_POST['delete_potion'])){
    $potion_id = mysqli_real_escape_string($conection, $_POST['delete_potion']);
    $sql = "DELETE FROM potions WHERE id = '$potion_id'";

    mysqli_query($conection, $sql);

    if(mysqli_affected_rows($conection) > 0){
        $_SESSION['message'] = 'Poção excluida com sucesso';
        header('Location: index.php');
        exit;
    }else {
        $_SESSION['message'] = 'Poção não foi excluida';
        header('Location: index.php');
        exit;
    }
}
?>