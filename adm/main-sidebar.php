<!-- Jquery para atualização de dados dinâmicos-->
<script type="text/javascript">
    function showPage(pageURL, titulo, breadcrumb) {
        $.ajax({
            type: "post",
            url: pageURL,
            data: {
                titulo: titulo,
                breadcrumb: breadcrumb
            },
        }).done(function(data) {
            console.log(data);
            //$(".content").text(data);
            document.getElementById("content-wrapper").innerHTML = data;
        });
    };

</script>

<!-- Coluna lateral esquerda. Contém a logo e a sidebar. -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                <img src="<?php echo MAINURL.$_SESSION ['Imagem_path']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php echo $_SESSION ['Nome']; ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVEGAÇÃO PRINCIPAL</li>

            <!--Inicio Menus do nivel de acesso ADMINISTRATIVO-->
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Configurações - Adm</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="javascript:showPage('./funcionarioses','Funcionários','Home,Configuração,Funcionários');"><i class="fa fa-circle-o"></i> Funcionários</a></li>
                </ul>
            </li>

            <!--Inicio Menus do nivel de acesso ADMINISTRATIVO-->

            <!--Inicio Menus do nivel de acesso USUARIO-->
            <li class="active treeview"><a href="./DefaultHome.tpl"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>

            <li><a href="javascript:showPage('./funcionarioses','TContatos','Home,Contatos');"><i class="fa fa-shopping-cart"></i> <span>Contatos</span></a></li>

            <li><a href="javascript:showPage('./funcionarioses','Tabela de Preço','Home,Tabela de Preço');"><i class="fa fa-shopping-cart"></i> <span>Tabela de preço</span></a></li>

            <li>
              <a href="./funcionarioses">
                <i class="fa fa-calendar"></i> <span>Turmas</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">3 abertas</small>
                  <small class="label pull-right bg-blue">17 em curso</small>
                </span>
              </a>
            </li>



            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i> <span>Alunos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="javascript:showPage('./funcionarioses','Alunos Pré-matriculados','Home,Alunos,Pré-matriculados');"><i class="fa fa-circle-o"></i> Pré-matriculados</a></li>
                <li><a href="javascript:showPage('./funcionarioses','Alunos Matriculados','Home,Alunos,Matriculados');"><i class="fa fa-circle-o"></i> Matriculados</a></li>
                <li><a href="javascript:showPage('./funcionarioses','Alunos Inativos','Home,Alunos,Inativos');"><i class="fa fa-circle-o"></i> Inativos</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Financeiro</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="javascript:showPage('./funcionarioses','Efetuar Pagamento','Home,Pagamento,Efetuar Pagamento');"><i class="fa fa-circle-o"></i> Efetuar Pagamento</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Controle</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="javascript:showPage('./funcionarioses','Entradas','Home,Controle,Entradas');"><i class="fa fa-circle-o"></i> Entradas</a></li>
                <li><a href="javascript:showPage('./funcionarioses','Caixa','Home,Controle,Caixa');"><i class="fa fa-circle-o"></i> Caixa</a></li>
                <li><a href="javascript:showPage('./funcionarioses','Estoque','Home,Controle,Estoque');"><i class="fa fa-circle-o"></i> Estoque</a></li>
                <li><a href="javascript:showPage('./funcionarioses','Listagem Geral','Home,Controle,Listagem Geral');"><i class="fa fa-circle-o"></i> Listagem Geral</a></li>
                <li><a href="javascript:showPage('./funcionarioses','Despesas Diversas','Home,Controle,Despesas Diversas');"><i class="fa fa-circle-o"></i> Despesas Diversas</a></li>
                <li><a href="javascript:showPage('./funcionarioses','Balanço','Home,Controle,Balanço');"><i class="fa fa-circle-o"></i> Balanço</a></li>
              </ul>
            </li>
            <!--Fim Menus do nivel de acesso USUARIO-->

            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
