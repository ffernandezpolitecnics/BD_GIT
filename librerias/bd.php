<?php



function errorMessage($e)
{
    if (!empty($e->errorInfo[1]))
    {
        switch ($e->errorInfo[1]) 
        {
            case 1062:
                $mensaje = 'Registro duplicado';
                break;
            case 1451:
                $mensaje = 'Registro con elementos relacionados';
                break;
            default:
                $mensaje = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                break;
        }
    }
    else 
    {
        switch ($e->getCode()) 
        {
            case 1044:
                $mensaje = "Usuario y/o password incorrecto";
                break;
            case 1049:
                $mensaje = "Base de datos desconocida";
                break;
            case 2002:
                $mensaje = 'No se encuentra el servidor';
                break;
            default:
                $mensaje = $e->getCode() . ' - ' .  $e->getMessage();
                break;
        }
       
    }

    return $mensaje;
}

function openBD()
{
    $servername = 'localhost';
    $dbname = 'hoteles_dwes';
    $username = 'root';
    $password = '';

    $conexion = new PDO(
        "mysql:host=$servername;dbname=$dbname", 
        $username, 
        $password, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conexion;
}

function closeBD()
{
    return null;
}

function insertCiudad($id_ciudad, $nombre)
{
    try
    {
        // Abrimos la conexión
        $conexion = openBD();

        //Preparamos la sentencia a ejecutar
        $sentencia = $conexion->prepare("insert into ciudades (id_ciudad, nombre) values (:id_ciudad, :nombre)");
        $sentencia->bindParam(':id_ciudad', $id_ciudad);
        $sentencia->bindParam(':nombre', $nombre);

        //Ejecutamos la sentencia
        $sentencia->execute();
        $_SESSION['mensaje'] = 'Registro insertado correctamente';
    }
    catch (PDOException $e)
    {
        $_SESSION['error'] = errorMessage($e);
        $ciudad['id_ciudad'] = $id_ciudad;
        $ciudad['nombre'] = $nombre;
        $_SESSION['ciudad'] = $ciudad;
    }

    //Cerramos la conexión
    $conexion = closeBD();
}

function selectAllCiudades()
{
    try
    {
        // Abrimos la conexión
        $conexion = openBD();

        //Preparamos la sentencia a ejecutar
        $sentencia = $conexion->prepare("select * from ciudades");

        //Ejecutamos la sentencia
        $sentencia->execute();

        // Convertimos el resultado en un array asociativo
        //$resultado = $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
        $_SESSION['error'] = errorMessage($e);
        $resultado = '';
    }

    //Cerramos la conexión
    $conexion = closeBD();

    return $resultado;
}

function selectCiudadById($id_ciudad)
{
    try
    {
        // Abrimos la conexión
        $conexion = openBD();

        //Preparamos la sentencia a ejecutar
        $sentencia = $conexion->prepare("select * from ciudades where id_ciudad = :id_ciudad");
        $sentencia->bindParam(':id_ciudad', $id_ciudad);

        //Ejecutamos la sentencia
        $sentencia->execute();

        // Convertimos el resultado en un array asociativo
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
        $_SESSION['error'] = errorMessage($e);
    }

    //Cerramos la conexión
    $conexion = closeBD();

    return $resultado;
}

function deleteCiudad($id_ciudad)
{
    try
    {
        // Abrimos la conexión
        $conexion = openBD();

        //Preparamos la sentencia a ejecutar
        $sentencia = $conexion->prepare("delete from ciudades where id_ciudad = :id_ciudad");
        $sentencia->bindParam(':id_ciudad', $id_ciudad);

        //Ejecutamos la sentencia
        $sentencia->execute();
        $_SESSION['mensaje'] = 'Registro borrado correctamente';
    }
    catch (PDOException $e)
    {
        $_SESSION['error'] = errorMessage($e);
    }

    //Cerramos la conexión
    $conexion = closeBD();
}

function updateCiudad($id_ciudad, $nombre)
{
    try
    {
        // Abrimos la conexión
        $conexion = openBD();

        //Preparamos la sentencia a ejecutar
        $sentencia = $conexion->prepare("update ciudades set nombre = :nombre where id_ciudad = :id_ciudad");
        $sentencia->bindParam(':id_ciudad', $id_ciudad);
        $sentencia->bindParam(':nombre', $nombre);

        //Ejecutamos la sentencia
        $sentencia->execute();
        $_SESSION['mensaje'] = 'Registro modificado correctamente';
    }
    catch (PDOException $e)
    {
        $_SESSION['error'] = errorMessage($e);
        $ciudad['id_ciudad'] = $id_ciudad;
        $ciudad['nombre'] = $nombre;
        $_SESSION['ciudad'] = $ciudad;
    }

    //Cerramos la conexión
    $conexion = closeBD();
}



?>