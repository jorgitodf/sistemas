
    <aside class="row-fluid container container-contato col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="row-fluid col-xs-12">
        <h2>Contato</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control"/><br/>

                <label>E-mail:</label>
                <input type="email" name="email" class="form-control"/><br/>

                <label>Mensagem:</label>
                <textarea type="text" name="mensagem" cols="51" rows="6" class="form-control"></textarea><br/>

                <input type="submit" value="Enviar Mensagem" class="btn btn-primary"/>
            </div>
            <div class="msg-email-sucesso col-xs-12">
                <?php if(!empty($msg)):?>
                    <span class="alert alert-success" id="alert-msg-email-sucesso"><?php echo $msg; ?></span>
                <?php endif;?>

            </div>
        </form>
        </div>
    </aside>
