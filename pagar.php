<?php
// IMPORTAR LA CONEXION
require '/xampp2/htdocs/magnoliacoffee/admin/database.php';
$db = conectarDB();
?>
<?php
include '../magnoliacoffee/includes/templates/header.php';
?>

<?php
include '../magnoliacoffee/includes/templates/navBar.php';
?>
<?php
include '../magnoliacoffee/tienda/carrito.php';

?>

<?php
if($_POST){
    $SID = session_id();
    $email = $_POST['email'];
    $total = 0;


    foreach($_SESSION['CARRITO'] as $indice => $articulo){
        $total = $total + $articulo['PRECIO'];
    }

    $sql = "INSERT INTO pedidos (fecha_pedido, claveTransaccion, paypalDatos, email, total, status)
    VALUES (NOW(), '$SID','', '$email', '$total', 'pendiente');";


    $resultado = mysqli_query($db, $sql);

    
}


?>



<?php
if($_POST){
    $total = 0;
    foreach($_SESSION['CARRITO'] as $indice => $articulo){
        $total = $total + $articulo['PRECIO'];
    }
 

}
?>
<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <h1 class="lead">Pagar con Paypal :
        <h1><?php echo number_format($total,2)."€"; ?></h4>
        <div id="paypal-container-8LEYXU9TFTSB4"></div>
</h2>
<script src="https://www.paypal.com/sdk/js?client-id=BAAQSEm2n6I9RLKnNuw2oaJ5tU9V39hTNmdkyfM3MyMgSqFklU14y7aQw8M6tuUiBbfUhONdSZvPWhYaTU&components=hosted-buttons&disable-funding=venmo&currency=EUR"></script>

<script>
  paypal.HostedButtons({
    hostedButtonId: "8LEYXU9TFTSB4",
  }).render("#paypal-container-8LEYXU9TFTSB4")
</script>
</div>




<!--  
 PAYPAL BUSSINESS DATA    
sb-cpzvn30647994@business.example.com
K/#DG.6i 

PERSONAL DATA
sb-ru7i130515628@personal.example.com
PDE[=p+9   
-->
<?php
include '../magnoliacoffee/includes/templates/footer.php';

?>

