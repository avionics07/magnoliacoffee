<?php


function insertarProductos(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
    
    try {
        //IMPORTAR CREDENCIALES DE CONEXION
        require 'database.php';

        //CONSULTA SQL
        $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, stock_disponible, categorias_idcategorias, proveedores_idproveedor)
        -> VALUES (:nombre_producto, :descripcion, :precio, :stock_disponible, :categorias_idcategorias, :proveedor_idproveedor)";

        //PREPARAR LA CONSULTA
        $stmt = $pdo->prepare($sql);

        //VINCULAR PARAMETROS

        $stmt->bindParam(':nombre_producto', $_POST('nombre_producto'));
        $stmt->bindParam(':descripcion', $_POST('descripcion'));
        $stmt->bindParam(':precio', $_POST('precio'));
        $stmt->bindParam(':stock_disponible', $_POST('stock_disponible'));
        $stmt->bindParam(':categorias_idcategorias', $_POST('categorias_idcategorias'));
        $stmt->bindParam(':proveedor_idproveedor', $_POST('proveedor_idproveedor'));


        //REALIZAR CONSULTA

        $stmt->execute();

        echo "Producto insertado";
    } catch (\Throwable $th){
        echo "Error: ".$th->getMessage();
    };
}
}
insertarProductos();