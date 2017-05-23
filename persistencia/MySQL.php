<?php
require_once 'configuracion.php';
require_once PER . DIRECTORY_SEPARATOR . 'ManejadorBaseDeDatosInterface.php';

class MySQL implements ManejadorBaseDeDatosInterface
{
    const USUARIO = 'root';
    const CLAVE = '';
    const BASE = 'tarea8';
    const SERVIDOR = 'localhost';

    private $_conexion;

    public function conectar()
    {
        $this->_conexion = mysqli_connect(
            self::SERVIDOR,
            self::USUARIO,
            self::CLAVE,
            self::BASE
        );
    }

    public function desconectar()
    {
        mysqli_close($this->_conexion);
    }

    public function traerDatos(SQL $sql)
    {
        echo DEBUG ? $sql : null;

        $resultado = mysqli_query($this->_conexion, $sql);

        while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)){
            $todo[] = $fila;
        }
        return $todo;
    }
}
