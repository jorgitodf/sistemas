
    <aside class="row-fluid container container-carrinho col-md-12 col-lg-12 col-sm-8 col-xs-10">
        <h2>Carrinho de Compras</h2><br/>
        <div class="table-responsive">
        <table class="table table-hover" id="table-carrinho">
            <tr>
                <th align="left">Imagem</th>
                <th align="left">Nome do Produto</th>
                <th align="left">Quantidade</th>
                <th align="left">Valor Unitário</th>
                <th align="left">Valor Total</th>
                <th align="left">Ações</th>
            </tr>
            <form method="post" action="carrinho/atualizarQuantidadeCarrinho">
            <?php $subtotal = 0; ?>


            <?php foreach($produtos as $key => $produto): ?>

                <tr>
                <td><img class="img-responsive" src="/assets/images/produtos/<?php echo $produto['imagem']; ?>" border="0" height="60" width="60" /></td>
                <td><?php echo $produto['nome']; ?></td>
                <td>

                     <input type="number" name="quantidade[<?php echo $produto['idprodutos']; ?>]" value="<?php echo $produto['quantidade']; ?>"/>

                </td>
                <td>R$ <input class="valor_unitario" type="text" readonly="true" value="<?php echo number_format($produto['preco'], 2, ',', '.') ; ?>"></td>
                <td><span class="total"></span></td>
                <td><a class="btn btn-default btn-mini" style="width: 45px; height: 35px" href="/carrinho/del/<?php echo $produto['idprodutos']; ?>" title="Remover Item"><i class="glyphicon glyphicon glyphicon-remove-circle" style="font-size: 20px; color: red" ></i></a></td>
            </tr>
            <?php endforeach ?>
            <?php $subtotal += $produto['preco']; ?>

            <tr>
                <th colspan="4" align="right">Subtotal:</th>
                <td colspan="1" align="left">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                <td><a class="btn btn-primary btn-small" style="width: 45px; height: 35px" href="/carrinho/finalizar" title="Finalizar Compra"><i class="glyphicon glyphicon gglyphicon glyphicon-ok" style="font-size: 15px; color: white" ></i></a></td>
            </tr>
        </table>
        </div>
        <button type="submit">Atualizar </button>
        </form>
    </aside>


