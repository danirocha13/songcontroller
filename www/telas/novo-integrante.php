<?php include_once 'topo-menu.php';?>

            <div id="content" class="jumbotron col-lg-offset-3" >
                <div class="topo">
                    <div class="alert alert-danger" role="alert">Cadastro duplicado</div>
                    <div class="col-md-6">
                        <h2>Cadastro Integrantes</h2>
                    </div>
                </div>
                <form>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Nome do integrante</label>
                                <input type="text" class="form-control"  placeholder="integrante">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Usuário</label>
                                <input type="text" class="form-control"  placeholder="usuário">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"  placeholder="email">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Selecione a categoria</label>
                                <select class="form-control">
                                    <option>Cantor</option>
                                    <option>Músico</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Senha</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="2kn2pj" disabled>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Selecione o status</label>
                                <select class="form-control">
                                    <option>Ativo</option>
                                    <option>Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Escolha foto de perfil</label>
                                <input type="file" id="exampleInputFile">                                 
                            </div>
                        </div>
                        <div class="row text-right">
                            <div class="col-xs-12 ">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">Cadastrar Integrante</button>
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