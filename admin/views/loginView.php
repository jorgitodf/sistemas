
    <aside class="row-fluid container container-login">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group">
                               <label class="col-md-2 control-label" for="email">E-mail</label>  
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" >
                                </div>
                            </div>   

                            <div class="form-group">
                               <label class="col-md-2 control-label"  for="senha">Senha</label>
                                <div class="col-md-6">
                                    <input id="senha" type="password" class="form-control" name="senha" >
                                </div>
                            </div>      

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Logar</button>
                                    <?php echo !empty($aviso) ? $aviso : "" ?>
                                </div>
                            </div>                        
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </aside>
