
            <div class="row-fluid col-md-9 col-xs-12">
                <div class="row-carrinho">
                <h1>Carrinho de Compras</h1><br/>
                <table class="table_carrinho" width=650>
                    <tr>
                        <th align="left">Imagem</th>
                        <th align="left">Nome do Produto</th>
                        <th align="left">Valor</th>
                        <th align="left">Ações</th>
                    </tr>
                    <?php $subtotal = 0; ?>
                    <?php foreach($produtos as $produto): ?>
                    <tr>
                        <td><img src="/assets/images/produtos/<?php echo $produto['imagem']; ?>" border="0" width="150px" height="70px" /></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo "R$: ". number_format($produto['preco'], 2, ',', '.') ; ?></td>
                        <td>
                            <a href="/carrinho/del/<?php echo $produto['idprodutos']; ?>">Remover</a>

                        </td>
                    </tr>
                    <?php $subtotal += $produto['preco']; ?>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="2" align="right">Subtotal:</th>
                        <td colspan="1" align="left">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                        <td><a href="/carrinho/finalizar">Finalizar Compra</a></td>    
                    </tr>    
                </table>
                </div>
            </div>


