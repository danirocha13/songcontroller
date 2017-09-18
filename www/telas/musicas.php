<?php include_once 'topo-menu.php';?>

            <div id="content" class="jumbotron col-lg-offset-3" >
                <div class="topo">
                    <div class="col-md-6">
                        <h2><u>Músicas</u></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success" href="novo-musica.php"><span class="glyphicon glyphicon-plus"></span>Novo</a>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span>Filtrar</button>
                    </div>
                </div>
                <div class="filtro">
                    <div class="filtro">
                        <form class="form-inline">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nome da Música</label>
                                    <input type="text" class="form-control"  placeholder="Nome da Música">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Nome do Artista/Banda</label>
                                        <input type="text" class="form-control"  placeholder="Artista/Banda">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover ">
                    <thead class="tabela-header">
                        <tr>
                            <th>Música</th>
                            <th>Artista/Banda</th>
                            <th>Album</th>
                            <th>Status</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Eu me rendo</strong></td>
                            <td><strong>Ministerio Pedras vivas</strong></td>
                            <td><strong>Desconhecido</strong></td>
                            <td><strong>Ativo</strong></td>
                            <td><div class="dropdown">
                                    <a class="glyphicon glyphicon-folder-open" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="visualizar-letra.php">Arquivo Letra</a></li>
                                        <li><a href="visualizar-cifra.php">Arquivo Cifra</a></li>
                                        <li><a href="https://www.youtube.com/watch?v=_qDKrvstS9c">Link Música</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Baixar e Editar Power Point</a></li>
                                        <li><a href="#">Baixar e Editar Cifra</a></li>
                                        <li><a href="#">Baixar Música</a></li>
                                    </ul>
                                </div></td>
                            <td><a class="glyphicon glyphicon-pencil" href="#"></a></td>
                            <td><a class="glyphicon glyphicon-trash" href="#"></a></td>
                        </tr>
                        <tr>
                            <td><strong>No lugar mais alto</strong></td>
                            <td><strong>Diego Natã</strong></td>
                            <td><strong>Desconhecido</strong></td>
                            <td><strong>Ativo</strong></td>
                            <td><a class="glyphicon glyphicon-folder-open" href="#" title="arquivo música"></a></td>
                            <td><a class="glyphicon glyphicon-pencil" href="#"></a></td>
                            <td><a class="glyphicon glyphicon-trash" href="#"></a></td>
                        </tr>


                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

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