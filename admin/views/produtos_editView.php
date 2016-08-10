

    <aside class="row-fluid container container-categoria-admin">
        <h2>Editar Produto</h2><br/>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome_produto" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome_produto" value="<?php echo $produto['nome']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="descricao" id="descricao" ><?php echo $produto['descricao']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="categoria" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoria">
                        <?php foreach ($categorias as $categoria): ?>
                            <option <?php echo ($categoria['idcategorias']==$produto['categoria_id'] ? 'selected="selected"':'') ?>value="<?php echo $categoria['idcategorias']?>"><?php echo $categoria['nome_categoria']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="preco" class="col-sm-2 control-label">Preço</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="preco" id="preco" value="<?php echo number_format($produto['preco'],2 , ',', '.'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="imagem" class="col-sm-2 control-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="imagem" id="imagem">
                    <img class="img-responsive img-rounded tam-img-home" src="/assets/images/produtos/<?php echo $produto['imagem']; ?>" alt="imagem"/>
                </div>
            </div>
            <div class="form-group">
                <label for="quantidade" class="col-sm-2 control-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php echo $produto['quantidade']; ?>">
                </div>
            </div>
            <br/>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <?php echo !empty($erro) ? $erro : "" ?>
                </div>
            </div>

        </form>
    </aside>