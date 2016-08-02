<div class="finalizar">
    <h1>Finalizar Compra</h1>
    <form method="POST" action="">
        <div class="field_user">
        <fieldset>
            <legend>Informações do Usuário</legend>
            Nome:<br/>
            <input type="text" name="nome"/><br/><br/>
            E-mail:<br/>
            <input type="email" name="email"/><br/><br/>
            Senha:<br/>
            <input type="password" name="senha"/><br/><br/>            
        </fieldset>
        </div>
        <div class="field_end">
        <fieldset>
            <legend>Informações de Endereço</legend>
            Endereço:<br/>
            <input type="text" name="endereco"/><br/><br/>            
        </fieldset><br/>
        </div>
        <div class="field_resumo_compra">
        <fieldset>
            <legend>Resumo da Compra</legend>
            Total a pagar: R$ <?php echo number_format($total, 2, ',', '.'); ?>
        </fieldset><br/>
        </div>        
        <div class="field_pgm">
        <fieldset>
            <legend>Informações de Pagamento</legend>
            <?php foreach($pagamentos as $pgm): ?>
            <input type="radio" name="pgm" value="<?php echo $pgm['idpagamentos']; ?>" /> <?php echo $pgm['tipo']; ?>
            <?php endforeach;?>
        </fieldset><br/><br/>
            <input type="submit" value="Efetuar Pagamento" />
        </div>
        <?php if(!empty($erro)): ?>
        <div class="erro"><?php echo $erro; ?></div>
        <?php endif; ?>
    </form>    
</div>   
<div style="clear:both"></div>