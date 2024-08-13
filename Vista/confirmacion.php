<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuaviareYa!</title>
    <script>
    // Redirigir a "shop" después de 3 segundos
    setTimeout(function() {
      window.location.href = "../Controladores/controlador.php?seccion=shop";
    }, 1000);
  </script>
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    <div class="container my-4">
    <div class="ico-carro">
            <a href="controlador.php?seccion=shop" class="btn btn-link">
                <i class="bx bxs-home"></i>
            </a>
        </div>

        <div class="d-flex flex-column align-items-center">
            <h1 class="mb-4">Gracias por tu compra</h1>
            <img src="../media/check.png" alt="listo" class="img-fluid" style="max-width: 400px;">
        </div>
    </div>
</body>

</html>
