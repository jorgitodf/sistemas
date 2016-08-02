<div class="empresa">
    <h1>Pedidos</h1>
    

    <table border="0" width="130%">
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
    <a href="/login/logout">Deslogar</a>
</div>

<div style="clear:both"></div>