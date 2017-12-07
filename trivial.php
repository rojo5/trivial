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
        <?php
        include './obtenerDatos.php';
        ?>

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
        <!--CABECERA-->
        <div class="row cabecera">
            <div class="col-xs-12">
                <h1 class="text-center titulo"> Test Selectividad</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 botones">
                    <div class="row" id="opcion">
                        <div class="col"><br></div>
                        <div class="btn-group-vertical col-xs-12">
                            <div id="acordeon">
                                <button id="btn-historia"class="btn btn-block btn-danger btn-lg">Historia</button>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-success jugar">Elegir Nivel</button>
                                </div>
                                <button id="btn-historia"class="btn btn-block btn-primary btn-lg">Inglés</button>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-success jugar">Elegir Nivel</button>
                                </div>
                                <button id="btn-historia"class="btn btn-block btn-primary btn-lg">Lengua</button>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-success jugar">Elegir Nivel</button>
                                </div>
                                <button id="btn-historia"class="btn btn-block btn-primary btn-lg">Economía</button>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-success jugar">Elegir Nivel</button>
                                </div>
                                <button id="btn-historia"class="btn btn-block btn-primary btn-lg">Filosofía</button>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-success jugar">Elegir Nivel</button>
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
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                            40%
                        </div>
                    </div>
                </div>
                <div class="col"><br></div>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" id="enunciado">
                    
                    </div>
                    <div class="col-xs-1"></div>
                </div>
                <div class="row"> 
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" id="respuestas">
                        
                    </div>
                    <div class="col-xs-1"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        iniciaPartida();
        //Niveles
        function iniciaPartida() {
            //tiene que mostrar algo para que se pueda elegir el numero de 
            //verbos con el que se va a jugar
            for (var i = 1; i < 11; i++) {
                $('#niveles').append('<div class="miniboton btn-group"> <button class="miniboton btn btn-lg btn-primary" onclick=""> ' + i * 1 + '</button></div>');
                if (i === 5) {
                    $('#niveles').append('<p></p>');
                }
            }
        }
//        cambiaBotones();
//
//        function cambiaBotones() {
//        $("#respuestas").append('<button class=" btn btn-block btn-primary btn-lg respuestas">' + $. + '</button>');
//            
//        }
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
    <!--CAMBIAR DE NIVELES  A PREGUNTAS-->
    <script>
        $(document).ready(function () {
            $(".miniboton").on("click", function () {
                $('#nivel').fadeOut();
                $('#preguntas').fadeIn('slow');
            });
        });
    </script>
    
    <!--LEER FICHERO JSON-->
    <script>
        $.getJSON("js/preguntas.json", function(cuestiones){
            $("#enunciado").append('<button class=" btn btn-default btn-lg btn-block">'+ cuestiones["pregunta"][0]["enunciado"] +'</button>')
            $("#respuestas").append('<button class=" btn btn-block btn-primary btn-lg respuestas">' + cuestiones["pregunta"][0]["r1"] + '</button>');
            $("#respuestas").append('<button class=" btn btn-block btn-primary btn-lg respuestas">' + cuestiones["pregunta"][0]["r2"] + '</button>');
            $("#respuestas").append('<button class=" btn btn-block btn-primary btn-lg respuestas">' + cuestiones["pregunta"][0]["r3"] + '</button>');
            $("#respuestas").append('<button class=" btn btn-block btn-primary btn-lg respuestas">' + cuestiones["pregunta"][0]["r4"] + '</button>');
        });
        </script>
</body>
</html>
