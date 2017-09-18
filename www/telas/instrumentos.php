<?php include_once 'topo-menu.php';?>

            <div id="content" class="jumbotron col-lg-offset-3" >
                <div class="topo">
                    <div class="col-md-6">
                        <h2><u>Instrumentos</u></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success" href="novo-instrumento.php"><span class="glyphicon glyphicon-plus"></span>Novo</a>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span>Filtrar</button>
                    </div>
                </div>
                <div class="filtro">
                    <div class="row">
                        <form class="form-inline">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nome do instrumento</label>
                                    <input type="text" class="form-control"  placeholder="Nome do instrumento">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover ">
                    <thead class="tabela-header">
                        <tr>
                            <th>Instrumento</th>
                            <th>Vinculado à</th>
                            <th>Situação</th>
                            <th>Status</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Guitarra(Ephifone)</strong></td>
                            <td><strong>Daniel</strong></td>
                            <td><strong>Ótimo</strong></td>
                            <td><strong>Ativo</strong></td>
                            <td><a class="glyphicon glyphicon-pencil" href="#"></a></td>
                            <td><a class="glyphicon glyphicon-trash" href="#"></a></td>
                            </tr>
                        <tr>
                            <td><strong>Bateria(Michael)</strong></td>
                            <td><strong>Arnaldo</strong></td>
                            <td><strong>Boa</strong></td>
                            <td><strong>Ativo</strong></td>
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