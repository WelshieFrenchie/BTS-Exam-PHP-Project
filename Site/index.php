<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        if(!isset($_SESSION['isprof'])) {
            header('Location: ./src/menuprof.php');
        }
        else {
            header('Location: ./src/menu.php');
        }
    }
    else {
        header('Location: ./src/accountmenu.php');
    }
?>