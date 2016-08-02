    
    <aside class="row-fluid container container-finalizar-compra col-md-12 col-lg-12 col-sm-8 col-xs-10">
        <div class="row-fluid">
        <h2>Finalizar Compra</h2><br/>
            <form method="POST" action="">
                <div class="form-group field_user col-md-5">
                    <legend>Informações do Usuário</legend>
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control"/><br/>
                    <label>E-mail:</label>
                    <input type="email" name="email" class="form-control"/><br/>
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control"/><br/>
                </div>

                <div class="form-group field_end col-md-5">
                    <legend>Informações de Endereço</legend>
                    <label>Endereço:</label>
                    <input type="text" name="endereco"  class="form-control"/>
                </div>

                <div class="form-group field_resumo_compra col-md-5">
                    <legend>Resumo da Compra</legend>
                    <p>Total a pagar: R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
                </div>

                <div class="form-group field_pgm col-md-5">
                    <legend>Informações de Pagamento</legend>
                        <?php foreach($pagamentos as $pgm): ?>
                        <input type="radio" name="pgm" value="<?php echo $pgm['idpagamentos']; ?>" /> <?php echo $pgm['tipo']; ?>
                        <?php endforeach;?>
                </div>

                <div class="form-group field_btn_pgm col-md-5">
                    <input type="submit" value="Efetuar Pagamento" class="btn btn-primary"/>
                </div>

                <?php if(!empty($erro)): ?>
                    <div class="erro"><?php echo "<span class='alert alert-danger col-xs-12'>".$erro."</span>"; ?></div>
                <?php endif; ?>                

            </form>

        </div>
    </aside>
