<?php include_once 'topo-menu.php';?>
            <div id="content" class="jumbotron col-lg-offset-3" >
                <div class="topo">
                    <div class="col-md-6">
                        <h2>Cadastro Instrumentos</h2>
                    </div>
                </div>


                <form>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Nome do instrumento</label>
                                <input type="text" class="form-control"  placeholder="Nome do instrumento">
                            </div>
                        </div>
                        
                         <div class="col-xs-4">
                            <div class="form-group">
                                <label>Selecione a situação</label>
                                <select class="form-control">
                                    <option>Otimo</option>
                                    <option>Bom</option>
                                    <option>Regular</option>
                                    <option>Ruim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Vinculado à: </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1"> Daniel
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" value="option2"> Arnaldo
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Selecione o status</label>
                                <select class="form-control">
                                    <option>Ativo</option>
                                    <option>Inativo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row text-right">
                        <div class="col-xs-12 ">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">Cadastrar Instrumento</button>
                            </div>
                        </div>

                    </div>
                </form>







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