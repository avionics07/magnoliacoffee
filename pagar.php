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
    <h1 class="lead">El total a pagar es de:
        <h1><?php echo number_format($total,2)."€"; ?></h4>
        <div id="paypal-container-8LEYXU9TFTSB4"></div>
</h2>
<script src="https://www.paypal.com/sdk/js?client-id=BAAQSEm2n6I9RLKnNuw2oaJ5tU9V39hTNmdkyfM3MyMgSqFklU14y7aQw8M6tuUiBbfUhONdSZvPWhYaTU&components=hosted-buttons&disable-funding=venmo&currency=EUR"></script>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <!-- Identificador del negocio vendedor y tipo de botón -->
        <input type="hidden" name="business" value="sb-cpzvn30647994_api1.business.example.com">
        <input type="hidden" name="cmd" value="_xclick">

        <!-- Detalles del producto y precios -->
        <input type="hidden" name="amount" value="<?php echo $total; ?>">
        <input type="hidden" name="currency_code" value="USD">

        <!-- URLs de retorno al finalizar el pago -->
        <input type="hidden" name="return" value="/index.php">

        <!-- Botón de envío -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
        alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1"
        src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>

<div id="paypal-button-container"></div>
<script>
paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $total; ?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        // Aquí puedes redirigir al usuario o mostrar un mensaje de éxito
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
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

