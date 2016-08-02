
        <div class="empresa">
            <h1>Detalhes do Pedido Nº <?php echo isset($idvenda) ? $idvenda : ""; ?></h1>
            <table border="0" width="130%">
                <tr>
                    <th>Nome do Produto</th>
                    <th>Imagem</th>
                    <th>Valor Unitário</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                </tr>
                <?php $subtotal = 0; ?>
                <?php foreach ($pedido as $value): ?>
                <tr>
                    <td><?php echo $value['nome']; ?></td>
                    <td><img src="/assets/images/produtos/<?php echo $value['imagem']; ?>" border="0" width="140px" height="80px" /></td>
                    <td><?php echo number_format($value['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo $value['quantidade']; ?></td>
                    <td><?php echo $value['descricao']; ?></td>
                    <?php $idvendas = $value['idvendas']; ?>
                </tr>
                <?php $subtotal += $value['preco']; ?>
                <?php endforeach; ?>
                <tr>
                    <th colspan="2" align="right">Total:</th>
                    <td colspan="1" align="left">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                    <td></td>    
                </tr>         
            </table><br/>
            <a href="/pedidos">Voltar</a>
        </div>
        <div style="clear:both"></div>