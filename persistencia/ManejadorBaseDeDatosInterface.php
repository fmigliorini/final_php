<?php
interface ManejadorBaseDeDatosInterface
{
  public function conectar();
  public function desconectar();
  public function traerDatos(SQL $sql);
}