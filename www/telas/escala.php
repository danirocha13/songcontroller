<?php include_once 'topo-menu.php';?>

            <div id="content" class="jumbotron col-lg-offset-3" >
                <div class="topo">
                    <div class="col-md-6">
                        <h2><u>Escala</u></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Filtrar</a>
                    </div>
                </div>
                <div class="filtro">
                    <div class="row">
                        <form class="form-inline">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label> a data da escala</label>
                                    <input type="date" class="form-control"  placeholder="Data da escala">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover ">
                    <thead class="tabela-header">
                        <tr>
                            <th>Data</th>
                            <th>Dirigente</th>
                            <th>Back Vocal</th>
                            <th>Violão</th>
                            <th>Baixo</th>
                            <th>Bateria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>13/11/1967</strong></td>
                            <td><strong>Paulo</strong></td>
                            <td><strong>Simone</strong></td>
                            <td><strong>Vitor</strong></td>
                            <td><strong>Henrique</strong></td>
                            <td><strong>Junior</strong></td>
                        </tr>
                        <tr>
                            <td><strong>13/11/1967</strong></td>
                            <td><strong>Paulo</strong></td>
                            <td><strong>Simone</strong></td>
                            <td><strong>Vitor</strong></td>
                            <td><strong>Henrique</strong></td>
                            <td><strong>Junior</strong></td>
                        </tr>
                        <tr>
                            <td><strong>13/11/1967</strong></td>
                            <td><strong>Paulo</strong></td>
                            <td><strong>Simone</strong></td>
                            <td><strong>Vitor</strong></td>
                            <td><strong>Henrique</strong></td>
                            <td><strong>Junior</strong></td>
                        </tr>
                        <tr>
                            <td><strong>13/11/1967</strong></td>
                            <td><strong>Paulo</strong></td>
                            <td><strong>Simone</strong></td>
                            <td><strong>Vitor</strong></td>
                            <td><strong>Henrique</strong></td>
                            <td><strong>Junior</strong></td>
                        </tr>
                        <tr>
                            <td><strong>13/11/1967</strong></td>
                            <td><strong>Paulo</strong></td>
                            <td><strong>Simone</strong></td>
                            <td><strong>Vitor</strong></td>
                            <td><strong>Henrique</strong></td>
                            <td><strong>Junior</strong></td>
                        </tr>
                        <tr>
                            <td><strong>13/11/1967</strong></td>
                            <td><strong>Paulo</strong></td>
                            <td><strong>Simone</strong></td>
                            <td><strong>Vitor</strong></td>
                            <td><strong>Henrique</strong></td>
                            <td><strong>Junior</strong></td>
                        </tr>
                        <tr>
                            <td><strong>13/11/1967</strong></td>
                            <td><strong>Paulo</strong></td>
                            <td><strong>Simone</strong></td>
                            <td><strong>Vitor</strong></td>
                            <td><strong>Henrique</strong></td>
                            <td><strong>Junior</strong></td>
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



        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>


        <script>
            $(function () {
                $("#calendario").datepicker();
            });
        </script>


        <script>
            $(function () {
                $("#calendario").datepicker({
                    showOn: "button",
                    buttonImage: "calendario.png",
                    buttonImageOnly: true
                });
            });
        </script>

<script>
$(function() {
    $("#calendario").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});
</script>









    </body>
</html>