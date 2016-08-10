 
    <aside class="row-fluid container container-produto_categoria_mostra col-md-12 col-lg-12 col-sm-8 col-xs-12">
        <div class="row row-produto_categoria_mostra">
            <div class="thumbnail produto-thumbnail">
                <figure class="produto_foto">
                    <img src="/assets/images/produtos/<?php echo $produtos['imagem']; ?>" border="0" width="280" height="200" />
                    <figcaption class="produto_info caption">
                        <h2><?php echo $produtos['nome']; ?></h2>
                        <h6 id="descricao-produto"><?php echo $produtos['descricao']; ?></h6>
                        <p><h3><?php echo "Preço: ". number_format($produtos['preco'], 2, ',', '.') ; ?></h3></p>
                        <?php if ($produtos['quantidade'] > 0 ) { ?>
                        <?php echo "<p><h6><span id='disponivel'>Disponível </span>no estoque: ". $produtos['quantidade'].' Unidade(s)'."</h6></p>"; ?>
                        <?php } else { ?>
                        <?php echo "<p><h6><span id='indisponivel'>Indisponível </span>no estoque: ". $produtos['quantidade'].' Unidade(s)'."</h6></p>"; ?>
                        <?php }; ?>
                        <a href="/carrinho/add/<?php echo $produtos['idprodutos']; ?>" class="btn btn-primary">Adicionar ao Carrinho</a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </aside>


