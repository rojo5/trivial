<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/jquery.raty.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estiloTrivial.css" rel="stylesheet" type="text/css"/>

        <script src="js/verbos.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.js" type="text/javascript"></script>
        <title>Trivial</title>
    </head>
    <body>
        <div class="row cabecera">
            <div class="col-xs-12">
                <h1 class="text-center"> Test Selectividad</h1>
                <div></div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div id="botones">
                    <button id="btn-historia"class="btn btn-block btn-primary btn-lg desplegable">Historia</button>

                    <button id="btn-ingles"class="btn btn-block btn-primary btn-lg desplegable">Inglés</button>
                    <button id="btn-lengua"class="btn btn-block btn-primary btn-lg desplegable">Lengua</button>
                    <button id="btn-economia"class="btn btn-block btn-primary btn-lg desplegable">Economía</button>
                    <button id="btn-filosofia"class="btn btn-block btn-primary btn-lg desplegable">Filosofia</button>
                </div>
            </div>
            <div class="col-xs-2"></div>
        </div>
        <script>
            // Desplegable
            $(document).ready(function () {
                $(".desplegable").click(function () {

                })
            })

            //Niveles
            function iniciaPartida() {
                //tiene que mostrar algo para que se pueda elegir el numero de 
                //verbos con el que se va a jugar
                for (var i = 1; i < 11; i++) {
                    $('#niveles').append('<div class="miniboton btn-group"> <button class="miniboton btn btn-large btn-primary" onclick="partida(' + i * 10 + ')"> ' + i * 10 + '</button></div>');
                    if (i === 5) {
                        $('#niveles').append('<p></p>');
                    }
                }



                cambiaBotones();
            }
        </script>

    </body>
</html>
