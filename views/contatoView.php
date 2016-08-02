
    <aside class="row-fluid container-contato container col-md-12 col-xs-12 col-sm-8 col-xs-10">
        <div class="row-fluid">
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
            <div class="form-group msg-email-sucesso">

                <?php if(!empty($msg)):?>
                    <div class="aviso alert alert-success"><?php echo $msg; ?></div>
                <?php endif;?>

            </div>
        </form>
        </div>
    </aside>
