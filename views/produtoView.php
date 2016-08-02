 
    <aside class="row-fluid produto_categoria_fundo">
        <figure class="produto_foto thumbnail">
            <img src="/assets/images/produtos/<?php echo $produtos['imagem']; ?>" border="0" width="280" height="200" />
            <figcaption class="produto_info caption">
                <h2><?php echo $produtos['nome']; ?></h2>
                <?php echo $produtos['descricao']; ?>
                <p><h3><?php echo "Preço: ". number_format($produtos['preco'], 2, ',', '.') ; ?></h3></p>
                <a href="/carrinho/add/<?php echo $produtos['idprodutos']; ?>" class="btn btn-primary">Adicionar ao Carrinho</a>
            </figcaption>                
        </figure>  
    </aside>


