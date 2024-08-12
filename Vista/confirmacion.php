<!DOCTYPE html>
<html lang="en">

<head>
  <title>GuaviareYa!</title>
  <script>
    // Redirigir a "shop" después de 3 segundos
    setTimeout(function() {
      window.location.href = "../Controladores/controlador.php?seccion=shop";
    }, 1000);
  </script>
</head>

<body>
    <div class="container">
        <div class="col-md-12 ico-carro">
            <a href="controlador.php?seccion=shop"><i class="bx bxs-home"></i></a>
        </div>

        <div class="subcontainer4">
            <h1 style="text-align: center;">Gracias por tu compra</h1>
            <center><img src="../media/check.png" alt="listo" width="400px"></center>
            
        </div>
    </div>
</body>

</html>
