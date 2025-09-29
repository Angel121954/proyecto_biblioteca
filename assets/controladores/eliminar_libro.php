<?php

if (isset($_POST["id_libro"]) && !empty($_POST["id_libro"])) {
    require_once "../modelos/MySQL.php";
    $sql = new MySQL();
    $sql->conectar();

    //* variable
    $id = intval($_POST["id_libro"]);

    $sql->efectuarConsulta("DELETE FROM libros WHERE id_libro = $id");
    $sql->desconectar();
}
