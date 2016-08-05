
<aside class="row-fluid container container-categoria-admin">
    <h1>Vendas</h1><br/>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th width="120" class="cabecalho">Número Venda</th>
                <th class="cabecalho">Nome Cliente</th>
                <th class="cabecalho">Valor</th>
                <th class="cabecalho">Forma Pagamento</th>
                <th class="cabecalho">Status</th>
                <th class="cabecalho">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($vendas as $venda): ?>
                <tr>
                    <td><?php echo $venda['idvendas']; ?></td>
                    <td><?php echo $venda['nome']; ?></td>
                    <td><?php echo "R$ ". number_format($venda['valor'], 2, ',', '.') ; ?></td>
                    <td><?php echo $venda['tipo']; ?></td>
                    <td><?php echo $venda['status_pagamento']; ?></td>

                    <td>
                        <a href="" class="btn btn-default">Editar</a>
                        <a href="" class="btn btn-default">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</aside>