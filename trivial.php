<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <!--JAVASCRIPT-->
        <script src="js/preguntas.json" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>

        <!--CSS-->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estiloTrivial.css" rel="stylesheet" type="text/css"/>

        <title>Trivial</title>
        <!--Funcion del arcodeon-->
        <script>
            $(function () {
                $("#acordeon").accordion();
            });
        </script>


    </head>
    <body>
        <?php
        $ingles = $_GET['ingles'];
        $lengua = $_GET['lengua'];
        $historia = $_GET['historia'];
        $economia = $_GET['economia'];
        $filosofia = $_GET['filosofia'];
        $usuario = $_GET['usuario'];
//        $usuario = "rojo5";
        ?>
        <script>
            var historia;
            var lengua;
            var ingles;
            var economia;
            var filosofia;
            var usuario = "<?php echo $usuario; ?>";
            
            obtenerNivel();
            console.log(usuario);
            function obtenerNivel() {
                var parametro = {
                    "usuario": usuario
                };

                $.ajax({
                    data: parametro,
                    url: "checkNiveles.php",
                    type: 'POST',
                    success: function (response) {
                        console.log("OK");
                    }
                });
                comprobarNivel();
            }
            function comprobarNivel() {
                $.getJSON("js/niveles.json", function (niveles) {
                    historia = niveles["niveles"][0]["nvHistoria"];
                    lengua = niveles["niveles"][0]["nvLengua"];
                    ingles = niveles["niveles"][0]["nvIngles"];
                    economia = niveles["niveles"][0]["nvEconomia"];
                    filosofia = niveles["niveles"][0]["nvFilosofia"];
                });
            }

        </script>
        <!--CABECERA-->
        <div class="row cabecera">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center titulo"> Test Selectividad</h1>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a class="enlace" href="cerrarSesion.php"><button class="btn btn-danger btn-block btn-lg">CERRAR SESIÓN</button></a>
                </div>
            </div>

        
        <div class="container">
            <div class="row">
                <div class="col-xs-12 botones">
                    <div class="row" id="opcion">
                        <div class="col"><br></div>
                        <div class="btn-group-vertical col-xs-12">
                            <script>obtenerNivel();</script>
                            <div id="acordeon">
                                <button class="btn btn-block btn-danger btn-lg" value="historia">Historia</button>
                                <div class="text-center">
                                    <button id="btn-historia" class="btn btn-lg btn-success jugar" value="historia" onclick="iniciaPartida(historia); filtrarPorAsignatura('Historia')">Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg temas" value="ingles">Inglés</button>
                                <div class="text-center">
                                    <button  id="btn-ingles"class="btn btn-lg btn-success jugar temas" value="ingles" onclick="iniciaPartida(ingles); filtrarPorAsignatura('Ingles')" >Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg" value="lengua">Lengua</button>
                                <div class="text-center">
                                    <button  id="btn-lengua"class="btn btn-lg btn-success jugar temas"  value="lengua" onclick="iniciaPartida(lengua); filtrarPorAsignatura('Lengua')" >Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg" value="economia">Economía</button>
                                <div class="text-center">
                                    <button id="btn-economia" class="btn btn-lg btn-success jugar temas" value="economia" onclick="iniciaPartida(economia); filtrarPorAsignatura('Economia')" >Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg" value="filosofia">Filosofía</button>
                                <div class="text-center">
                                    <button id="btn-filosofia" class="btn btn-lg btn-success jugar temas" value="filosofia" onclick="iniciaPartida(filosofia); filtrarPorAsignatura('Filosofia')" >Elegir Nivel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--ELECCION DE NIVELES-->
            <div class="nivel text-center" id="nivel">
                <div class="titulo">
                    <h1>Niveles</h1>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <button class="btn btn-lg btn-danger volver"><i class="fa fa-reply"></i></button>
                    </div>
                    <div class="col-xs-10"></div>
                </div>
                <div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-8">
                        <div id="niveles"></div>
                    </div>
                    <div class="col-xs-2"></div>
                </div>
            </div>
            <!--PLANTILLA PREGUNTAS-->
            <div class="row" id="preguntas">
                <div class="col"><br></div>
                <!--TEMPORIZADOR-->
                <div clas="row">
                    <h3 class="text-center titulo">CUENTA ANTRAS</h3>
                    <div class="progress">
                        <div id="barraProgreso" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            <span id="porcentaje"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="titulo text-center">
                        <h3 class="grosor">
                            <span id="c1">1</span>
                            <span id="c2">2</span>
                            <span id="c3">3</span>
                            <span id="c4">4</span>
                            <span id="c5">5</span>
                            <span id="c6">6</span>
                            <span id="c7">7</span>
                            <span id="c8">8</span>
                            <span id="c9">9</span>
                            <span id="c10">10</span>

                        </h3>
                    </div>
                </div>
                <div class="col"><br></div>
                <div class="row">

                    <div class="col-xs-13" id="enunciado"></div>

                </div>
                <div class="row"> 
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" id="respuestas"></div>
                    <div class="col-xs-1"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var numNivel;
        var maxNivel;
        //Niveles
        function iniciaPartida(desbloquea) {
            maxNivel = desbloquea;
            console.log("desbloquea " +desbloquea);
            $('#niveles').text("");
            //tiene que mostrar algo para que se pueda elegir el numero de 
            //verbos con el que se va a jugar
            console.log("Justo antes de entrar " + desbloquea);
            for (var i = 1; i <= desbloquea; i++) {
                if (i == desbloquea) {
                    $('#niveles').append('<div class="miniboton btn-group"> <button id="' + i + '" class="miniboton btn btn-lg btn-primary" onclick="ultimoNivel(this)" value="' + i + '">' + i * 1 + '</button></div>');
                    if (i === 5) {
                        $('#niveles').append('<p></p>');
                    }
                } else {
                    $('#niveles').append('<div class="miniboton btn-group"> <button id="' + i + '" class="miniboton btn btn-lg btn-primary" onclick="">' + i * 1 + '</button></div>');
                    if (i === 5) {
                        $('#niveles').append('<p></p>');
                    }
                }
            }
            for (var u = i; u < 11; u++) {
                $('#niveles').append('<div class="miniboton btn-group"> <button id="' + u + '" class="miniboton btn btn-lg btn-primary" onclick="" disabled>' + u * 1 + '</button></div>');
                if (u === 5) {
                    $('#niveles').append('<p></p>');
                }
            }
            //CAMBIAR DE NIVELES  A PREGUNTAS
            $(document).ready(function () {
                $(".miniboton").on("click", function () {
                    $('#nivel').fadeOut();
                    $('#preguntas').fadeIn('slow');
                });
            });
        }

        function ultimoNivel(valor) {
            numNivel = valor.id;

        }

    </script>
    <!--CAMBIAR DE MATERIAS A NIVELES-->
    <script>
        $(document).ready(function () {
            $(".jugar").on("click", function () {
                $('#opcion').toggle();
                $('#nivel').fadeIn('slow');
            });
        });

        $(document).ready(function () {
            $(".volver").on("click", function () {
                $('#opcion').fadeIn('slow');
                $('#nivel').toggle();
            });
        });
    </script>

    <!--LEER FICHERO JSON-->
    <script>
        var posicion;
        var longitud;
        var correcta;
        var contador = 1;
        var aciertos = 0;
        var modulo;
        var stopBarra;


        function crearJSON() {

            $.getJSON("js/preguntas.json", function (cuestiones) {
                longitud = Object.keys(cuestiones["pregunta"]).length;
                posicion = Math.floor(Math.random() * longitud);
                correcta = cuestiones["pregunta"][posicion]["correcta"];
                $("#c" + contador).addClass("text-primary");
                console.log("Respuesta " + correcta);


//                        $("#progreso").append('<div id="barraProgreso" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">100</div>')

                move();
                $("#enunciado").append('<button class=" btn btn-default btn-lg btn-block">' + cuestiones["pregunta"][posicion]["enunciado"] + '</button>');
                $("#respuestas").append('<button id="btn-1" class=" btn btn-block btn-primary btn-lg respuestas" value="1" onclick="comprueba(correcta,1, this); stopBarra=true;">' + cuestiones["pregunta"][posicion]["r1"] + '</button>');
                $("#respuestas").append('<button id="btn-2" class=" btn btn-block btn-primary btn-lg respuestas" value="2" onclick="comprueba(correcta,2, this); stopBarra=true;">' + cuestiones["pregunta"][posicion]["r2"] + '</button>');
                $("#respuestas").append('<button id="btn-3"class=" btn btn-block btn-primary btn-lg respuestas"  value="3" onclick="comprueba(correcta,3, this); stopBarra=true;" >' + cuestiones["pregunta"][posicion]["r3"] + '</button>');
                $("#respuestas").append('<button id="btn-4"class=" btn btn-block btn-primary btn-lg respuestas"  value="4" onclick="comprueba(correcta,4, this); stopBarra=true;" >' + cuestiones["pregunta"][posicion]["r4"] + '</button>');

            }
            );
        }


        function filtrarPorAsignatura(materia) {
            console.log(materia);
            modulo = materia;
            var parametro = {
                "materia": materia
            };

            $.ajax({
                data: parametro,
                url: "obtenerDatos.php",
                type: 'POST',
                success: function (response) {
                    $("#enunciado").text('');
                    $("#respuestas").text('');
                    crearJSON();

                }
            });
        }



        function comprueba(_correcta, seleccionada, comp) {
            var correcta = _correcta;           //
            var eleccion = seleccionada;        //
            var id = comp.id;                   //


            $(".respuestas").prop('disabled', true);

            if (correcta == eleccion) {
                aciertos++;
                $("#" + id).text("CORRECTO")
                        .addClass("btn btn-block btn-success btn-lg")
                        .fadeOut("slow")
                        .fadeIn("slow", function () {
                            $("#c" + contador).addClass("text-success");
                            sigue();
                            contador++;
                            $("#c" + contador).addClass("text-primary");
                        });

            } else {
                $("#" + id).text("INCORRECTO")
                        .addClass("btn btn-block btn-danger btn-lg")
                        .fadeOut("slow")
                        .fadeIn("slow", function () {
                            $("#c" + contador).addClass("text-danger");
                            sigue();
                            contador++;
                            $("#c" + contador).addClass("text-primary");
                        });
            }

        }

        function sigue() {
            $("#enunciado").text('');
            $("#respuestas").text('');
            if (contador < 10) {
                crearJSON();
            } else {
                $("#enunciado").text('');
                $("#respuestas").text('');
                $("#enunciado").append('<h1 class="titulo text-center">¡¡¡Has acabado el nivel!!!</h1>');
                $("#respuestas").append('<h3 class="titulo text-center">Has acertado: ' + aciertos + ' de 10</h3>');
                console.log(usuario);
                if (aciertos >= 5) {
                    console.log("numNivel: " + numNivel + "maxNivel: " + maxNivel);
                    if (numNivel == maxNivel) {
                        console.log("Me cole");
                        numNivel++;
                        modulo = "nv" + modulo;
                        console.log("materia " + modulo + " nivel " + numNivel + " usuario " + usuario);
                        var parametro = {
                            "materia": modulo,
                            "nivel": numNivel,
                            "usuario": usuario
                        };

                        $.ajax({
                            data: parametro,
                            url: "actualizarDatos.php",
                            type: 'POST',
                            success: function (response) {
                                console.log("Nivel actualiado // " + maxNivel);
                                obtenerNivel();
                                maxNivel++;
                                console.log(maxNivel);
                                iniciaPartida(maxNivel);
                            }
                        });
                    }
                    $("#respuestas").append('<button class="btn btn-block btn-success btn-lg yoda">Elegir nivel</button>');

                } else {
                    $("#respuestas").append('<button class="btn btn-block btn-danger btn-lg yoda">Elegir nivel</button>');
                }

                $(document).ready(function () {
                    $(".yoda").on("click", function () {
                        $('#nivel').fadeIn('slow');
                        $('#preguntas').fadeOut();
                        reinicio();
                    });
                });
            }
        }

        function reinicio() {
            contador = 1;
            aciertos = 0;
            $("#enunciado").text('');
            $("#respuestas").text('');
            crearJSON();
            for (var i = 1; i <= 10; i++) {
                $("#c" + i).removeClass("text-danger");
                $("#c" + i).removeClass("text-success");
                $("#c" + i).removeClass("text-primary");
            }
        }

        function move() {
            var elem = document.getElementById("barraProgreso");
            var width = -2;
            var id2 = setInterval(frame, 200);
            function frame() {
                if ((width >= 100) || (stopBarra == true)) {
                    clearInterval(id2);
                    if (width >= 100) {
                        seAcaboTiempo();
                    }
                    stopBarra = false;
                } else {
                    width++;
                    document.getElementById("porcentaje").innerHTML = width + '%';
                    elem.style.width = width + '%';
                }
            }
        }

        function seAcaboTiempo() {
            $(".respuestas").prop('disabled', true)
                    .text("INCORRECTO")
                    .addClass("btn btn-block btn-danger btn-lg");

            $("#c" + contador).addClass("text-danger");
            sigue();
            contador++;
            $("#c" + contador).addClass("text-primary");
        }
    </script>
</body>
</html>