<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login Trivial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Links CCS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>

        <!-- Scripts -->
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body id="prueba">
        <div id="container">

            <div id="dialog" title="La verdad">
                <p>¿Quieres ver la verdad?</p>
                <button id="laVerdad" class=" btn btn-block btn-danger" onclick="cambiafondo()">Mostrar</button>
            </div>

            <button id="opener" class="btn btn-danger">La verdad</button>


            <div class="form">

                <ul class="tab-group">
                    <li class="tab active"><a href="#login">Iniciar sesión</a></li>
                    <li class="tab "><a href="#signup">Registrarse</a></li>
                </ul>

                <div class="tab-content">


                    <div id="login">   
                        <h1>Iniciar sesión</h1>

                        <form action="checklogin.php" method="post">

                            <div class="field-wrap">
                                <label>
                                    Usuario
                                </label>
                                <input type="text" name="usuario" id="usuario" required>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Contraseña
                                </label>
                                <input type="password" name="clave" id="clave" required>
                            </div>



                            <button class="button button-block"/>Iniciar sesión</button>

                        </form>

                    </div>

                    <div id="signup">   
                        <h1>Registro</h1>

                        <form action="/" method="post">


                            <div class="field-wrap">
                                <label>
                                    Usuario
                                </label>
                                <input type="text" required>
                            </div>


                            <div class="field-wrap">
                                <label>
                                    Correo Electronico
                                </label>
                                <input type="email" required>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Contraseña
                                </label>
                                <input type="password" required>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Repetir contraseña
                                </label>
                                <input type="password" required>
                            </div>

                            <button type="submit" class="button button-block">Registrarse</button>

                        </form>

                    </div>

                </div><!-- tab-content -->

            </div> <!-- /form -->        
        </div>


        <!-- FUNCIONES -->
        <script>
            $('.form').find('input, textarea').on('keyup blur focus', function (e) {

                var $this = $(this),
                        label = $this.prev('label');

                if (e.type === 'keyup') {
                    if ($this.val() === '') {
                        label.removeClass('active highlight');
                    } else {
                        label.addClass('active highlight');
                    }
                } else if (e.type === 'blur') {
                    if ($this.val() === '') {
                        label.removeClass('active highlight');
                    } else {
                        label.removeClass('highlight');
                    }
                } else if (e.type === 'focus') {

                    if ($this.val() === '') {
                        label.removeClass('highlight');
                    } else if ($this.val() !== '') {
                        label.addClass('highlight');
                    }
                }

            });

            $('.tab a').on('click', function (e) {

                e.preventDefault();

                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');

                target = $(this).attr('href');

                $('.tab-content > div').not(target).hide();

                $(target).fadeIn(600);

            });


//            prueba

            $(function () {
                $("#dialog").dialog({
                    autoOpen: false,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    }
                });

                $("#opener").on("click", function () {
                    $("#dialog").dialog("open");
                });
            });
            
            
            function cambiafondo(){
                document.body.style.backgroundImage = "url('/Trivial/imagenes/ussr.jpg')";
                document.getElementById('dialog').innerHTML = "<audio autoplay><source src='temazo.mp3' type='audio/mpeg'></audio>";  
            }
        </script>
    </body>
</html>
