<?php include_once 'topo-menu.php';?>

            <div id="content" class="jumbotron col-lg-offset-3" >
                <div class="topo">
                    <div class="col-md-6">
                        <h2>Cadastro Músicas</h2>
                    </div>
                </div>


                <form>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Nome da Música</label>
                                <input type="text" class="form-control"  placeholder="Nome da Música">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Nome do Artista/Banda</label>
                                <input type="text" class="form-control"  placeholder="Artista/Banda">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Link da musica</label>
                                <input type="text" class="form-control"  placeholder="Link youtube">
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Cifra</label>
                                <input type="file" id="exampleInputFile">                                 
                            </div>
                        </div>


                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Arquivo Mp3</label>
                                <input type="file" id="exampleInputFile">                                   
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Power Point</label>
                                <input type="file" id="exampleInputFile">
                            </div>
                        </div> 
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Letra</label>
                                <input type="file" id="exampleInputFile">
                            </div>
                        </div> 
                    </div>
                    <div class="row text-right">
                        <div class="col-xs-12 ">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">Cadastrar Música</button>
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