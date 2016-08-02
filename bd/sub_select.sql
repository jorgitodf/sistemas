Select *, (Select categorias.nome_categoria From categorias Where categorias.idcategorias = produtos.categoria_id) as categoria From produtos ;
