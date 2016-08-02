<div class="contato">
    <h1>Contato</h1>
    <form method="POST" action="">
        <?php if(!empty($msg)):?>
        <div class="aviso"><?php echo $msg; ?></div>
        <?php endif;?>
        Nome:<br/>
        <input type="text" name="nome" /><br/><br/>
        E-mail:<br/>
        <input type="email" name="email" /><br/><br/>
        Mensagem:<br/>
        <textarea type="email" name="mensagem" cols="51" rows="6"></textarea><br/><br/>
        <input type="submit" value="Enviar Mensagem"/><br/><br/>
        
    </form>
</div>
<div style="clear:both"></div>