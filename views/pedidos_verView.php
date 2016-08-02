
    <aside class="row-fluid container container-resumo-pedido-detalhe">
        <h2>Detalhes do Pedido Nº <?php echo isset($idvenda) ? $idvenda : ""; ?></h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover" width="100%">
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
                    <td><img src="/assets/images/produtos/<?php echo $value['imagem']; ?>" border="0" width="140px" height="70px" /></td>
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
                    <td></td>    
                </tr>         
            </table><br/>
            <a href="/pedidos"><i class="glyphicon glyphicon-chevron-left" style="font-size: 35px; color: green" title="Voltar a Página Anterior"></i></a>
        </div>
    </aside>
