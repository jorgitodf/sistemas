
    <aside class="row-fluid container container-resumo-pedido col-md-12 col-xs-12 col-sm-8 col-xs-10">
        <h2>Pedidos</h2><br/>
        <div class="table-responsive">
        <table class="table table-striped table-hover" width="110%">
            <tr>
                <th>Número do Pedido</th>
                <th>Valor Pago</th>
                <th>Forma de Pagamento</th>
                <th>Status do Pagamento</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($pedidos as $value): ?>
            <tr>
                <td><?php echo $value['idvendas']; ?></td>
                <td><?php echo number_format($value['valor'], 2, ',', '.'); ?></td>
                <td><?php echo $value['tipo']; ?></td>
                <td><?php echo $value['status_pagamento']; ?></td>
                <td><a href="/pedidos/ver/<?php echo $value['idvendas']; ?>">Detalhes</a></td>
            </tr>
            <?php endforeach; ?>
        </table><br/>
        <a class="btn-deslogar" href="/login/logout"><i class="glyphicon glyphicon glyphicon-off" style="font-size: 25px; color: blue" title="Deslogar"></i></a>
        </div>
    </aside>

