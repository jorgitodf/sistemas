 
    <aside class="row-fluid container container-categoria-admin">
        <h1>Produtos</h1><br/>
        <a href="/admin/produtos/adicionar" class="btn btn-primary">Adicionar</a><br/><br/>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="cabecalho">Nome</th>
                        <th width="110" class="cabecalho">Imagem</th>
                        <th width="100" class="cabecalho">Preço</th>
                        <th width="80" class="cabecalho">Quantidade</th>
                        <th width="250" class="cabecalho">Descrição</th>
                        <th class="cabecalho">Categoria</th>
                        <th width="180" class="cabecalho">Ações</th>
                    </tr>
                </thead>
                <tbody> 
                <?php foreach($produtos as $prod): ?>
                    <tr>
                        <td><?php echo $prod['nome']; ?></td>
                        <td><img src="/assets/images/produtos/<?php echo $prod['imagem']; ?>" border="0" width="100" height="80" /></td>
                        <td><?php echo "R$: ". number_format($prod['preco'], 2, ',', '.') ; ?></td>
                        <td><?php echo $prod['quantidade']; ?></td>
                        <td><?php echo $prod['descricao']; ?></td>
                        <td><?php echo $prod['categoria']; ?></td>
                        <td>
                            <a href="/admin/produtos/editar/<?php echo $prod['idprodutos']; ?>" class="btn btn-default">Editar</a>
                            <a href="/admin/produtos/remover/<?php echo $prod['idprodutos']; ?>" class="btn btn-default">Remover</a>
                        </td>
                    </tr>                    
                <?php endforeach; ?>
                </tbody>    
            </table>
            <?php $conta = ceil($total_produtos / $limite_produtos);
                for ($index = 1; $index <= $conta; $index++): ?>
                <a href="/admin/produtos?p=<?php echo $index; ?>"><?php echo $index; ?></a>
            <?php endfor; ?>
        </div>    
    </aside>
