   
    <aside class="row-fluid container container-mostra-categoria produto_categoria_row col-md-12 col-lg-12 col-sm-8 col-xs-8">
        
        <div class="row row-mostra-categoria">
        <h2><?php echo $categoria; ?></h2>
            <?php foreach ($produtos as $produto): ?>

            <div class="col-xs-12 col-md-2 col-sm-6 div-prod-mostra">
                <a href="/produto/ver/<?php echo $produto['idprodutos']; ?>" title="Clique para ver mais Detalhes">
                    <div class="thumbnail img-prod-categoria">
                        <img class="img-responsive center-block img-rounded tam-img-ver-categoria" src="/assets/images/produtos/<?php echo $produto['imagem']; ?>" />
                        <figcaption class="caption">
                            <p><strong><?php echo $produto['nome']; ?></strong></p>
                        </figcaption>
                        <figcaption class="caption">
                            <p><?php echo "R$ ".  number_format($produto['preco'], 2, ',', '.'); ?></p>
                        </figcaption>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </aside>