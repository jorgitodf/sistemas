
<aside class="row-fluid container container-finalizar-compra col-md-12 col-lg-12 col-sm-8 col-xs-10">
    <div class="row-fluid">
        <h2>Identificação</h2><br/>
        <div class="div-sem-cadastro col-sm-5">
            <form method="POST" action="../cliente/logar" id="form-com-cadastro">
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Já possuo cadastro</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="" for="email">E-mail:</label>
                            <input type="email" name="emailCad" id="email-com-cadastro" class="form-control input-sm" value="<?php echo !empty($emailCad) ? $emailCad : '' ; ?>"/>
                            <?php echo !empty($erroEmailCad) ? $erroEmailCad : "" ?></span>
                        </div>
                        <div class="form-group">
                            <label class="" for="senha">Senha:</label>
                            <input type="password" name="senhaCad" id="senha-com-cadastro" class="form-control input-sm" value="<?php echo !empty($senhaCad) ? $senhaCad : '' ; ?>"/>
                            <?php echo !empty($erroSenhaCad) ? $erroSenhaCad : "" ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="div-com-cadastro col-sm-5">
            <form method="POST" action="../cliente" id="form-sem-cadastro">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Não possuo cadastro</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="" for="cpf-sem-cadastro">CPF:</label>
                            <input type="text" name="cpf-sem-cadastro" id="cpf-sem-cadastro" class="form-control input-sm" value="<?php echo !empty($cpf) ? $cpf : '' ; ?>"/>
                            <?php echo !empty($erroCpf) ? $erroCpf : "" ?>
                        </div>
                        <div class="form-group">
                            <label class="" for="email-sem-cadastro">E-mail:</label>
                            <input type="email" name="email-sem-cadastro" id="email-sem-cadastro" class="form-control input-sm" value="<?php echo !empty($email) ? $email : '' ; ?>"/>
                            <?php echo !empty($erroEmail) ? $erroEmail : "" ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <?php echo !empty($cpfAviso) ? $cpfAviso : "" ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</aside>
