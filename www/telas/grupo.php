<?php include_once 'topo-menu.php';?>

            <div id="content" class="jumbotron col-lg-offset-3" >
                <div class="topo">
                    
                    <div class="col-md-6">
                        <h2><u>Grupos</u></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-success" href="novo-grupo.php"><span class="glyphicon glyphicon-plus"></span>Novo</a>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span>Filtrar</button>
                    </div>
                </div>
                <div class="filtro">

                    <form>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Nome do grupo</label>
                                    <input type="text" class="form-control"  placeholder="Nome do grupo">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-hover ">
                    <thead class="tabela-header">
                        <tr>
                            <th>Grupo</th>
                            <th>Igreja</th>
                            <th>Resposável</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Louvor sede</strong></td>
                            <td><strong>Peniel</strong></td>
                            <td><strong>Alveci</strong></td>
                            <td><a class="glyphicon glyphicon-pencil" href="#"></a></td>
                            <td><a class="glyphicon glyphicon-trash" href="#"></a></td>
                        </tr>
                        <tr>
                            <td><strong>J.A</strong></td>
                            <td><strong>Peniel J.A</strong></td>
                            <td><strong>Paulo Junior</strong></td>
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
