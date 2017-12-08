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
//        include './obtenerDatos.php';
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
                                <button class="btn btn-block btn-danger btn-lg" value="historia">Historia</button>
                                <div class="text-center">
                                    <button id="btn-historia" class="btn btn-lg btn-success jugar" value="historia" onclick="filtrarPorAsignatura('Historia')">Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg temas" value="ingles">Inglés</button>
                                <div class="text-center">
                                    <button  id="btn-ingles"class="btn btn-lg btn-success jugar temas" value="ingles" onclick="filtrarPorAsignatura('Ingles')" >Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg" value="lengua">Lengua</button>
                                <div class="text-center">
                                    <button  id="btn-lengua"class="btn btn-lg btn-success jugar temas"  value="lengua" onclick="filtrarPorAsignatura('Lengua')" >Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg" value="economia">Economía</button>
                                <div class="text-center">
                                    <button id="btn-economia" class="btn btn-lg btn-success jugar temas" value="economia" onclick="filtrarPorAsignatura('Economia')" >Elegir Nivel</button>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg" value="filosofia">Filosofía</button>
                                <div class="text-center">
                                    <button id="btn-filosofia" class="btn btn-lg btn-success jugar temas" value="filosofia" onclick="filtrarPorAsignatura('Filosofia')" >Elegir Nivel</button>
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
        var posicion;
        var longitud;
        var correcta;
        function crearJSON() {
            $.getJSON("js/preguntas.json", function (cuestiones) {
                longitud = Object.keys(cuestiones["pregunta"]).length;
                posicion = Math.floor(Math.random() * longitud);
                correcta = cuestiones["pregunta"][posicion]["correcta"];
                console.log(correcta);

                $("#enunciado").append('<button class=" btn btn-default btn-lg btn-block">' + cuestiones["pregunta"][posicion]["enunciado"] + '</button>');
                $("#respuestas").append('<button id="btn-1" class=" btn btn-block btn-primary btn-lg respuestas" value="1" onclick="comprueba(correcta,1, this)">' + cuestiones["pregunta"][posicion]["r1"] + '</button>');
                $("#respuestas").append('<button id="btn-2" class=" btn btn-block btn-primary btn-lg respuestas" value="2" onclick="comprueba(correcta,2, this)">' + cuestiones["pregunta"][posicion]["r2"] + '</button>');
                $("#respuestas").append('<button id="btn-3"class=" btn btn-block btn-primary btn-lg respuestas"  value="3" onclick="comprueba(correcta,3, this)">' + cuestiones["pregunta"][posicion]["r3"] + '</button>');
                $("#respuestas").append('<button id="btn-4"class=" btn btn-block btn-primary btn-lg respuestas"  value="4" onclick="comprueba(correcta,4, this)">' + cuestiones["pregunta"][posicion]["r4"] + '</button>');
            }
            );
        }
    </script>

    <script>
        function filtrarPorAsignatura(materia) {
            console.log(materia);
            var parametro = {
                "materia": materia
            };

            $.ajax({
                data: parametro,
                url: "obtenerDatos.php",
                type: 'POST',
                success: function (response) {
                    crearJSON();
                    console.log("he pasado");
                }
            });
        }
    </script>

    <script>
        function comprueba(_correcta, seleccionada, comp) {
            var correcta = _correcta;
            var eleccion = seleccionada;
            var id = comp.id;
            console.log("El boton es:" + id);
            console.log(correcta);
            console.log(eleccion);

            if (correcta == eleccion) {
                $("#"+id).text("CORRECTO")
                        .addClass("btn btn-block btn-success btn-lg")
                        .fadeOut("slow")
                        .fadeIn("slow", function () {
                            sigue(id);
                        });
                console.log("adios");
            }else{
                $("#"+id).text("INCORRECTO")
                        .addClass("btn btn-block btn-danger btn-lg")
                        .fadeOut("slow")
                        .fadeIn("slow", function () {
                            sigue(id);
                        });
            }
        }
        
        function sigue(id){
            $("#enunciado").text('');
            $("#respuestas").text('');
            crearJSON();
        }
        
        
    </script>

</body>
</html>
