<?php

//session_start();
//include_once("/phpMVC/seguranca.php");

$id_usuario     = '';
$nome_usuario   = '';
$email          = '';
$login          = '';
$senha          = '';
$imagem_path    = '';
$status         = '';
$created        = '';
$modified       = '';
?>

<head>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/phpMVC/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/phpMVC/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/phpMVC/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/phpMVC/dist/css/skins/_all-skins.min.css">
</head>

<div id="formulario">
<form method"post" action="<?php echo MAINURL;?>controle-usuario/salvar">
    <label>Id</label>
    <input type="text" readonly="true" name="txtIdUsuario" value=""><br /> 
    <label>Nome</label>
    <input type="text" readonly="false" name="txtNomeUsuario" value="<?php echo $nome_usuario;?>"><br /> 
    <label>Email</label>
    <input type="text" readonly="false" name="txtEmail" value="<?php echo $email;?>"><br /> 
    <label>Login</label>
    <input type="text" readonly="false" name="txtLogin" value="<?php echo $login;?>"><br /> 
    <label>Senha</label>
    <input type="password" readonly="false" name="txtSenha" value="<?php echo $senha;?>"><br /> 
    <label>Imagem</label>
    <input type="text" readonly="false" name="txtImagem" value="<?php echo $imagem_path;?>"><br /> 
    <label>Status</label>
    <input type="text" readonly="true" name="txtStatus" value="<?php echo $status;?>"><br /> 
    <label>Criado em</label>
    <input type="text" readonly="true" name="txtCreated" value="<?php echo $created;?>"><br /> 
    <label>Última modificação em</label>
    <input type="text" readonly="true" name="txtModified" value="<?php echo $modified;?>"><br /> 
    
    <!--
    <input type="button" action='executaAcao(<?php echo MAINURL?>controle-usuario/listar/)' value="Pesquisar">
    <input type="submit" action='executaAcao(<?php echo MAINURL?>controle-usuario/novo/)' value="Novo">
    -->
    <a href='<?php echo MAINURL?>controle-usuario/novo/'>Novo</a>

</form>
</div>

<!--
<div id="lista">
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>LOGIN</th>
            <th>SENHA</th>
            <th>IMAGEM</th>
            <th>STATUS</th>
            <th>CRIADO EM</th>
            <th>ÚLTIMA ALTERAÇÃO EM</th>
            <th>CONTROLES</th>
        </tr>
    
    <tbody>

        <?php

        // como o método listar usuários já foi chamado basta pegar o resultado da lista e colocar em um objeto
        $aUsu = $this->getDados("usuarios");
        //echo print_r($aUsu);
        //Array ( [0] => Usuario Object ( [id_usuario:Usuario:private] => 2 [nome_usuario:Usuario:private] => Fernando Reis [email:Usuario:private] => freisrj@gmail.com [login:Usuario:private] => freisrj [senha:Usuario:private] => cdj100 [imagem_path:Usuario:private] => /imagem/users/Fernando_02.jpg [status:Usuario:private] => A [created:Usuario:private] => 2016-05-29 02:22:32 [modified:Usuario:private] => ) ) 1


        if ($aUsu) {

            foreach($aUsu as $usuario) {

                $usuario instanceof Usuario;

                $id_usuario     = '';
                $nome_usuario   = '';
                $email          = '';
                $login          = '';
                $senha          = '';
                $imagem_path    = '';
                $status         = '';
                $created        = '';
                $modified       = '';
                
                if ($usuario){
                    $id_usuario     = $usuario->getIdUsuario();
                    $nome_usuario   = $usuario->getNomeUsuario();
                    $email          = $usuario->getEmail();
                    $login          = $usuario->getLogin();
                    $senha          = $usuario->getSenha();
                    $imagem_path    = $usuario->getImagemPath();
                    $status         = $usuario->getStatus();
                    $created        = $usuario->getCreated(true);
                    $modified       = $usuario->getModified(true);
                } 
                echo '<tr>';
                echo '<td>' . $id_usuario . '</td>';
                echo '<td>' . $nome_usuario . '</td>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $login . '</td>';
                echo '<td>' . $senha . '</td>';
                echo '<td>' . $imagem_path . '</td>';
                echo '<td>' . $status . '</td>';
                echo '<td>' . $created . '</td>';
                echo '<td>' . $modified . '</td>';

                echo "<td>";
                echo "<a href='" . MAINURL . "controle-usuario/excluir/" . $id_usuario . "/'>Excluir</a>&nbsp;";
                echo "<a href='" . MAINURL . "controle-usuario/editar/" . $id_usuario . "/'>Editar</a>";
                //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-usuario/excluir/" . $id_usuario . "/)' value='Excluir'>";
                //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-usuario/editar/" . $id_usuario . "/)' value='Editar'>";
                echo "</td>";
                echo '</tr>';
            }
        }
        ?>

    </tbody>
    </thead>
</table>
-->


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $_POST['titulo'] ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="/phpMVC/main2.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Configurações</li>
        <li class="active">
            <?php echo $pagina; ?>
        </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="panel-body">

            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <div class="pull-left">
                                <img src="/phpMVC/img/users/avatar.jpg" class="img-circle" alt="User Image">
                            </div>
                            <button type="button" class="btn btn-default center">Alterar Foto</button>
                        </div>
                    </div>
                </div>


                <div class="col-sm-9">


                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputName" placeholder="Nome">
                            </div>
                            <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Usuário</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Usuário">
                            </div>
                            <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="inputEmail" placeholder="Senha">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputConfirmeSenha" class="col-sm-2 control-label">Confirme a Senha</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="inputEmail" placeholder="Confirme novamente a Senha">
                            </div>
                            <label for="inputNivelAcesso" class="col-sm-2 control-label">Nível de acesso</label>
                            <div class="col-sm-4">
                                <select class="form-control">
                                    <option>1 - Administrador</option>
                                    <option>2 - Usuário</option>
                                </select>
                            </div>
                        </div>


                        <!--
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Aceito os <a href="#">termos e condições.</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                        <label>
                            Show
                            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries
                        </label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Search:
                            <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Id: activate to sort column ascending" style="width: 50px;">Id</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending" style="width: 161px;">Nome</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 150px;">E-mail</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Usuário: activate to sort column ascending" style="width: 176px;">Usuário</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nível de acesso: activate to sort column ascending" style="width: 137px;">Imagem</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Foto: activate to sort column ascending" style="width: 99px;">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Foto: activate to sort column ascending" style="width: 99px;">Criado em</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Foto: activate to sort column ascending" style="width: 99px;">Alterado em</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Foto: activate to sort column ascending" style="width: 99px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php

                                    // como o método listar usuários já foi chamado basta pegar o resultado da lista e colocar em um objeto
                                    $aUsu = $this->getDados("usuarios");
                                    //echo print_r($aUsu);
                                    //Array ( [0] => Usuario Object ( [id_usuario:Usuario:private] => 2 [nome_usuario:Usuario:private] => Fernando Reis [email:Usuario:private] => freisrj@gmail.com [login:Usuario:private] => freisrj [senha:Usuario:private] => cdj100 [imagem_path:Usuario:private] => /imagem/users/Fernando_02.jpg [status:Usuario:private] => A [created:Usuario:private] => 2016-05-29 02:22:32 [modified:Usuario:private] => ) ) 1


                                    if ($aUsu) {

                                        foreach($aUsu as $usuario) {

                                            $usuario instanceof Usuario;

                                            $id_usuario     = '';
                                            $nome_usuario   = '';
                                            $email          = '';
                                            $login          = '';
                                            //$senha          = '';
                                            $imagem_path    = '';
                                            $status         = '';
                                            $created        = '';
                                            $modified       = '';

                                            if ($usuario){
                                                $id_usuario     = $usuario->getIdUsuario();
                                                $nome_usuario   = $usuario->getNomeUsuario();
                                                $email          = $usuario->getEmail();
                                                $login          = $usuario->getLogin();
                                                //$senha          = $usuario->getSenha();
                                                $imagem_path    = $usuario->getImagemPath();
                                                $status         = $usuario->getStatus();
                                                $created        = $usuario->getCreated(true);
                                                $modified       = $usuario->getModified(true);
                                            } 
                                            echo '<tr>';
                                            echo '<td>' . $id_usuario . '</td>';
                                            echo '<td>' . $nome_usuario . '</td>';
                                            echo '<td>' . $email . '</td>';
                                            echo '<td>' . $login . '</td>';
                                            //echo '<td>' . $senha . '</td>';
                                            echo '<td>' . $imagem_path . '</td>';
                                            echo '<td>' . $status . '</td>';
                                            echo '<td>' . $created . '</td>';
                                            echo '<td>' . $modified . '</td>';

                                            echo "<td>";
                                            echo "<a href='" . MAINURL . "controle-usuario/excluir/" . $id_usuario . "/'>Excluir</a>&nbsp;";
                                            echo "<a href='" . MAINURL . "controle-usuario/editar/" . $id_usuario . "/'>Editar</a>";
                                            //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-usuario/excluir/" . $id_usuario . "/)' value='Excluir'>";
                                            //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-usuario/editar/" . $id_usuario . "/)' value='Editar'>";
                                            echo "</td>";
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Id</th>
                                <th rowspan="1" colspan="1">Nome</th>
                                <th rowspan="1" colspan="1">E-mail</th>
                                <th rowspan="1" colspan="1">Usuário</th>
                                <th rowspan="1" colspan="1">Imagem</th>
                                <th rowspan="1" colspan="1">Status</th>
                                <th rowspan="1" colspan="1">Criado em</th>
                                <th rowspan="1" colspan="1">Alterado em</th>
                                <th rowspan="1" colspan="1">Ações</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li>
                            <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li>
                            <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

</section>
<!-- /.content -->
