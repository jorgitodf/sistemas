
    <aside class="row-fluid container container-categoria-admin">
        <h1>Categorias</h1><br/>
        <a href="/admin/categorias/adicionar" class="btn btn-primary">Adicionar</a><br/><br/>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="cabecalho">Nome</th>
                        <th width="180" class="cabecalho">Ações</th>
                    </tr>
                </thead>
                <tbody> 
                <?php foreach($categorias as $cat): ?>
                    <tr>
                        <td><?php echo $cat['nome_categoria']; ?></td>
                        <td>
                            <a href="/admin/categorias/editar/<?php echo $cat['idcategorias']; ?>" class="btn btn-default">Editar</a>
                            <a href="/admin/categorias/remover/<?php echo $cat['idcategorias']; ?>" class="btn btn-default">Remover</a>
                        </td>
                    </tr>                    
                <?php endforeach; ?>
                </tbody>    
            </table>
        </div>    
    </aside>
