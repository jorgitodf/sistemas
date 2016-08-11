
<aside class="row-fluid container container-finalizar-compra col-md-12 col-lg-12 col-sm-8 col-xs-10">
    <div class="row-fluid">
        <h2>Identificação</h2><br/>
        <div class="div-sem-cadastro col-sm-5">
            <form method="POST" action="" id="form-com-cadastro">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Já possuo cadastro</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="" for="email">E-mail:</label>
                            <input type="email" name="email" id="email-com-cadastro" class="form-control input-sm"/>
                        </div>
                        <div class="form-group">
                            <label class="" for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha-com-cadastro" class="form-control input-sm"/>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Acessar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="div-com-cadastro col-sm-5">
            <form method="POST" action="../cliente/cadastrar" id="form-sem-cadastro">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Não possuo cadastro</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="" for="email">CPF:</label>
                            <input type="text" name="email" id="cpf-sem-cadastro" class="form-control input-sm"/>
                        </div>
                        <div class="form-group">
                            <label class="" for="senha">E-mail:</label>
                            <input type="email" name="senha" id="email-com-cadastro" class="form-control input-sm"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</aside>
