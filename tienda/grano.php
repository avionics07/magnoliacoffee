
<?php
    include '../includes/templates/header.php';
?>

<?php
    include '../includes/templates/navBar.php';
?>

<body>
     <section class="molido">


        <h2>Nuestra Mejor Selección de Cafe en Grano</h2>
  

        <?php
            $limite = 6;
            include '../includes/templates/articulos.php'

        ?>
      

     </section>

<?php

include '../includes/templates/footer.php';

?>

<script src="/build/js/bundle.min.js"></script>

</body>
</html>