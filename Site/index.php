<?php 
    if (!isset($_SESSION['login'])) {
        header('Location: ./src/menu.php');
    }
    else {
        header('Location: ./src/accountmenu.php');
    }
?>  