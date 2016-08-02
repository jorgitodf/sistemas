<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nossa Loja</title>
    <link rel="stylesheet" href="/assets/css/template.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<main>
    <header class="topo navbar-fixed-top">
    </header>

    <nav class="navbar navbar-inverse nav-pills navbar-fixed-top" id="nav-menu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active pull-left"><a href="/admin/">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="/admin/categorias">Categorias</a></li>
                    <li><a href="/admin/produtos">Produtos</a></li>
                    <li><a href="/admin/vendas">Vendas</a></li>
                    <li><a href="/admin/usuarios">Usuários</a></li>
                    <li class="pull-right"><a href="/admin/login/logout">Sair</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </nav>

    <section class="container col-md-9 col-xs-12">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </section>

</main>

<script src="/assets/js/jquery-3.1.0.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>