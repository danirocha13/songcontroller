<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>SongController</title>

        <!-- Bootstrap core CSS -->
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">


        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container inner">

            <!-- Static navbar -->
            <nav class="navbar navbar-color">

                <div class="navbar-">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SongController</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <form class="navbar-form navbar-right">
                        <a class="btn btn-default" href="login.html"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
                    </form>


                </div><!--/.nav-collapse -->


            </nav>


            <div class="col-md-2" style="background: #222; border-radius: 5px ">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="index.php">Página Inicial<span class="sr-only">(current)</span></a></li>
                    <li ><a href="grupo.php">Grupo <span class="sr-only">(current)</span></a></li>
                    <li><a href="integrantes.php">Integrantes</a></li>
                    <li><a href="musicas.php">Músicas </a></li>
                    <li><a href="instrumentos.php">Instrumentos</a></li>
                    <li><a href="escala.php">Escala</a></li>
                </ul>

            </div>

            <div class="jumbotron col-lg-offset-3 col-md-offset-3 ">
                <div class="row">
                    <div class="topo">
                        <div class="col-xs-6">
                            <h2><u>Quadro de avisos</u></h2>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a class="btn btn-success" href="quadro-avisos.html"><span class="glyphicon glyphicon-plus"></span>Novo</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p>Amanhã dia 30/04/1997 não haverá ensaio</p>
                        <p>Amanhã dia 30/04/1997 não haverá ensaio</p>
                        <p>Amanhã dia 30/04/1997 não haverá ensaio</p>
                        <p>Amanhã dia 30/04/1997 não haverá ensaio</p>
                    </div>
                </div>

            </div>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>






    </body>
</html>