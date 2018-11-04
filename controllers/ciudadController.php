<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bd/librerias/bd.php';

if (isset($_POST['borrar'])) 
{
    deleteCiudad($_POST['id_ciudad']);

    header('Location: /bd/vistas/ciudades.php');
    exit();
}
elseif (isset($_POST['alta'])) 
{
    insertCiudad($_POST['id_ciudad'], $_POST['nombre']);

    if (isset($_SESSION['error']))
    {
        header('Location: /bd/vistas/ciudad.php');
        exit();
    }
    else 
    {
        header('Location: /bd/vistas/ciudades.php');
        exit();
    }
}
elseif (isset($_POST['modificar']))
{
    updateCiudad($_POST['id_ciudad'], $_POST['nombre']);
    
    if (isset($_SESSION['error']))
    {
        header('Location: /bd/vistas/ciudad_edit.php');
        exit();
    }
    else 
    {
        header('Location: /bd/vistas/ciudades.php');
        exit();
    }
}

?>
