<!DOCTYPE html>
<html lang="en">

<head>

<!-- POR EL MOMENTO NO VAMOS A UTILIZAR ESTA PARTA DEL CODIGO -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDOS</title>

    <!-- ===== ===== lINKS ===== ===== -->
    <link rel="stylesheet" href="..css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- ===== ===== Cuerpo Principal-Fondo ===== ===== -->
    <span class="main_bg"></span>


    <!-- ===== ===== Contenedor-principal ===== ===== -->
    <div class="container">

        <!-- ===== ===== Encabezado/Barra de navegación ===== ===== -->
        <header>
            <div class="gua">
                <br><br>
                <span><h3>MI PERFIL</h3></span>
            </div>
        </header>


        <!-- ===== ===== Perfil principal del usuario ===== ===== -->
        <section class="userProfile card">
            <div class="profile">
                <figure><img src="../media/profile.jpg" alt="profile" width="250px" height="250px"></figure>
            </div>
        </section>


        <!-- ===== ===== Sección de Trabajo y Habilidades ===== ===== -->
        <section class="work_skills card">

            <!-- ===== ===== Contenedor de Trabajo ===== ===== -->
            <div class="work">
                <h1 class="heading">UBICACIONES</h1>
                <div class="primary">
                    <h1>San Jorge</h1>
                    <span>Primaria</span>
                    <p>CRA 20-13 <br> CASA ROJA</p>
                </div>

                <div class="secondary">
                    <h1>GOBERNACION</h1>
                    <span>Secundaria</span>
                    <p>PISO 3</p>
                </div>
            </div>
        </section>


        <!-- ===== ===== Secciones de detalles del usuario ===== ===== -->
        <section class="userDetails card">
            <div class="userName">
                <h1 class="name">#User</h1>
                <div class="map">
                    <i class="ri-map-pin-fill ri"></i>
                    <span>San Jose del Guaviare</span>
                </div>
            </div>
            <br><br>
            <div class="rank">
                <h1 class="heading">Total de pedidos ordenados</h1>
                <span>0 <box-icon name='sad'></box-icon></span>
            </div>

            <div class="btns">
                <ul>
                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="pedidos_per.html">Tus pedidos</a>
                    </li>

                    <li class="sendMsg">
                        <i class="ri-chat-4-fill ri"></i>
                        <a href="perfil.html">Contacto</a>
                    </li>
                </ul>
            </div>
        </section>


        <!-- ===== ===== Acerca de las secciones ===== ===== -->
        <section class="timeline_about card">
            <div class="tabs">
                <ul>
                    <li class="about active">
                        <i class="ri-user-3-fill ri"></i>
                        <span>Historial</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                        <div class="col-sm-6">
                             <h4 class="label"> ¡No tienes ningún pedido! ¡Cambiemos eso!</h4>
                        </div>
            </div>
            <br>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Ordena ahora</button>
            </div>
        </section>
    </div>

</body>

</html>