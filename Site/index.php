<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: ./src/menu.php');
    }
    else {
        if(isset($_SESSION['isprof'])) {
            header('Location: ./src/profmenu.php');
        }
        else {
            header('Location: ./src/accountmenu.php');
        }
    }
?>