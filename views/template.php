<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Nossa Loja</title>
    <link rel="stylesheet" href="/assets/css/template.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" href="/assets/fonts/glyphicons-halflings-regular.ttf" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<main>
    <header class="topo navbar-fixed-top">
        <div class="row-fluid div_login">
            <span><?php
                if (!isset($_SESSION['novo_cliente']) && !isset($_SESSION['cliente'])) {
                    echo "Olá Visitante, <a href='../cliente'>faça seu login</a>";
                } elseif (isset($_SESSION['cliente'])) {
                    echo "Seja bem vindo, ".utf8_encode($_SESSION['cliente']['nome']);
                } elseif (isset($_SESSION['novo_cliente'])) {
                    echo "Seja bem vindo, ".utf8_encode($_SESSION['novo_cliente']['nome'])  ;
                }
                ?>
            </span>
        </div>
    </header>
    <button class="menu-abrir">Abre Menu</button>
    <nav class="navbar nav navbar-inverse barra-nav nav-pills navbar-fixed-top" id="nav-menu">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Menu</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Nossa Loja</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse menu_loja" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="/empresa">Empresa</a></li>
                <?php foreach($menu as $menuitem): ?>
                <li><a href="/categoria/ver/<?php echo $menuitem['idcategorias']; ?>"><?php echo utf8_encode($menuitem['nome_categoria']); ?></a></li>
                <?php endforeach; ?>
                <li><a href="/contato">Contato</a></li>
                <li><a href="/pedidos">Pedidos</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="img-carrinho">
                    <a href="/carrinho">Carrinho: <?php echo (isset($_SESSION['carrinho'])) ? count($_SESSION['carrinho']) : 0; ?> itens</a>
                </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->

    </nav>

    <section class="row-fluid col-md-10 col-xs-12">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </section>

    <footer>
    </footer>

</main>

<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery-3.1.0.min.js"></script>
<!-- <script src="/assets/js/carrinho.js"></script> -->
<!-- <script src="/assets/js/menu.js"></script> -->

</body>
</html>
