Select vendas.idvendas, vendas.valor, vendas.forma_pag, (Select status_pagamento.status_pagamento From status_pagamento Where status_pagamento.idstatus_pagamento = vendas.forma_pag) as 'Status' From vendas WHERE usuario_id = 2;

SELECT idvendas_produtos, vendas.idvendas, produtos.nome, produtos.imagem, produtos.preco, vendas_produtos.quantidade, produtos.descricao
FROM vendas LEFT JOIN usuarios ON vendas.usuario_id = usuarios.idusuarios LEFT JOIN vendas_produtos ON vendas_produtos.venda_id = vendas.idvendas  LEFT JOIN produtos ON produtos.idprodutos = vendas_produtos.produto_id  WHERE venda_id = 13 AND vendas.usuario_id = 7;

Select idvendas from vendas Where usuario_id = 7;

Select * from vendas Where usuario_id = 7;


