<?php

//session_start();
//include_once("/phpMVC/seguranca.php");

$id_fun     = "";
$nome       = "";
$apelido    = "";
$telefone   = "";
$celular    = "";
$funcao     = "";
$endereco   = "";
$bairro     = "";
$cidade     = "";
$cep        = "";
$uf         = "";
$imagem     = "";
$imagem_path = "";
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $_POST['titulo']; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i> Home</a></li>
        <li> Configurações</li>
        <li class="active">
            <?php echo $_POST['titulo']; ?>
        </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">

    <div class="box box-pimary">
        <div class="panel-body">

            <div class="row">

                <div class="col-sm-12">

                    <form class="form-horizontal" method"post" action="<?php echo MAINURL;?>controle-funcionario/salvar">
                        <label>Id Fun</label>
                        <input type="text" readonly="true" name="txtIdFun" value=""><br /> 
                        <label>Nome</label>
                        <input type="text" readonly="false" name="txtNome" value="<?php echo $nome;?>"><br /> 
                        <label>Apelido</label>
                        <input type="text" readonly="false" name="txtApelido" value="<?php echo $apelido;?>"><br /> 
                        <label>Telefone</label>
                        <input type="text" readonly="false" name="txtTelefone" value="<?php echo $Telefone;?>"><br /> 
                        <label>Celular</label>
                        <input type="password" readonly="false" name="txtCelular" value="<?php echo $celular;?>"><br /> 

                        <label>Função</label>
                        <input type="password" readonly="false" name="txtFuncao" value="<?php echo $Funcao;?>"><br /> 

                        <label>Endereço</label>
                        <input type="password" readonly="false" name="txtEndereco" value="<?php echo $endereco;?>"><br /> 
                        <label>Bairro</label>
                        <input type="password" readonly="false" name="txtBairro" value="<?php echo $bairro;?>"><br /> 
                        <label>Cidade</label>
                        <input type="password" readonly="false" name="txtCidade" value="<?php echo $cidade;?>"><br /> 
                        <label>CEP</label>
                        <input type="password" readonly="false" name="txtCep" value="<?php echo $cep;?>"><br /> 
                        <label>Uf</label>
                        <input type="password" readonly="false" name="txtUf" value="<?php echo $uf;?>"><br /> 

                        <label>Imagem</label>
                        <input type="text" readonly="false" name="txtImagem" value="<?php echo $imagem;?>"><br /> 
                        <label>Imagem Caminho</label>
                        <input type="text" readonly="false" name="txtImagemPath" value="<?php echo $imagem_path;?>"><br /> 
                        
                        <!--
                        <input type="button" action='executaAcao(<?php echo MAINURL?>controle-funcionario/listar/)' value="Pesquisar">
                        <input type="submit" action='executaAcao(<?php echo MAINURL?>controle-funcionario/novo/)' value="Novo">
                        -->
                        
                        <div class="form-group">

                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                <button type="button" action="<?php echo MAINURL;?>controle-funcionario/lista-de-funcionario/" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</section>
<!-- /.content -->



<!--
<div id="lista">
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>APELIDO</th>
            <th>TELEFONE</th>
            <th>CELULAR</th>
            <th>FUNÇÃO</th>
            <th>ENDEREÇO</th>
            <th>BAIRRO</th>
            <th>CIDADE</th>
            <th>CEP</th>
            <th>UF</th>
            <th>IMAGEM</th>
            <th>IMAGEM PATH</th>
            <th>CONTROLES</th>
        </tr>
    
    <tbody>

        <?php

        // como o método listar usuários já foi chamado basta pegar o resultado da lista e colocar em um objeto
        $aFun = $this->getDados("funcionarios");
        //echo print_r($aFun);
        //Array ( [0] => Usuario Object ( [id_usuario:Usuario:private] => 2 [nome_usuario:Usuario:private] => Fernando Reis [email:Usuario:private] => freisrj@gmail.com [login:Usuario:private] => freisrj [senha:Usuario:private] => cdj100 [imagem_path:Usuario:private] => /imagem/users/Fernando_02.jpg [status:Usuario:private] => A [created:Usuario:private] => 2016-05-29 02:22:32 [modified:Usuario:private] => ) ) 1


        if ($aFun) {

            foreach($aFun as $f) {

                $f instanceof Funcionario;

                $id_fun     = "";
                $nome       = "";
                $apelido    = "";
                $telefone   = "";
                $celular    = "";
                $funcao     = "";
                $endereco   = "";
                $bairro     = "";
                $cidade     = "";
                $cep        = "";
                $uf         = "";
                $imagem     = "";
                $imagem_path = "";
                
                if ($f){
                    $id_fun = $f->getIdFun();
                    $nome = $f->getNome();
                    $apelido = $f->getApelido();
                    $telefone = $f->getTelefone();
                    $celular = $f->getCelular();
                    $funcao = $f->getFuncao();
                    $endereco = $f->getEndereco();
                    $bairro = $f->getBairro();
                    $cidade = $f->getCidade();
                    $cep = $f->getCep();
                    $uf = $f->getUf();
                    $imagem = $f->getImagem();
                    $imagem_path = $f->getImagemPath();
                } 
                echo '<tr>';
                echo '<td>' . $id_fun . '</td>';
                echo '<td>' . $nome . '</td>';
                echo '<td>' . $apelido . '</td>';
                echo '<td>' . $telefone . '</td>';
                echo '<td>' . $celular . '</td>';
                echo '<td>' . $funcao . '</td>';
                echo '<td>' . $endereco . '</td>';
                echo '<td>' . $bairro . '</td>';
                echo '<td>' . $cidade . '</td>';
                echo '<td>' . $cep . '</td>';
                echo '<td>' . $uf . '</td>';
                echo '<td>' . $imagem . '</td>';
                echo '<td>' . $imagem_path . '</td>';

                echo "<td>";
                echo "<a href='" . MAINURL . "controle-funcionario/excluir/" . $id_fun . "/'>Excluir</a>&nbsp;";
                echo "<a href='" . MAINURL . "controle-funcionario/editar/" . $id_fun . "/'>Editar</a>";
                //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-funcionario/excluir/" . $id_usuario . "/)' value='Excluir'>";
                //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-funcionario/editar/" . $id_usuario . "/)' value='Editar'>";
                echo "</td>";
                echo '</tr>';
            }
        }
        ?>

    </tbody>
    </thead>
</table>
-->


<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="panel-body">

            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <div class="pull-left">
                                <img src="<?php echo MAINURL?>img/users/avatar.jpg" class="img-circle" alt="User Image">
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
                            <label for="inputApelido" class="col-sm-2 control-label">Apelido</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputApelido" placeholder="Apelido">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputTelefone" class="col-sm-2 control-label">Telefone</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputTelefone" placeholder="Telefone">
                            </div>
                            <label for="inputCelular" class="col-sm-2 control-label">Celular</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="inputCelular" placeholder="Celular">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEndereco" placeholder="Endereço">
                            </div>
                            <label for="inputBairro" class="col-sm-2 control-label">Bairro</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputBairro" placeholder="Bairro">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCidade" class="col-sm-2 control-label">Cidade</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputCidade" placeholder="Cidade">
                            </div>
                            <label for="inputCep" class="col-sm-2 control-label">CEP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputCep" placeholder="CEP">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFuncao" class="col-sm-2 control-label">Função</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputFuncao" placeholder="Função">
                            </div>
                            <label for="inputImagemPath" class="col-sm-2 control-label">Imagem Caminho</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputImagemPath" placeholder="Imagem Caminho">
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
                                    $aFun = $this->getDados("funcionarios");
                                    //echo print_r($aFun);
                                    //Array ( [0] => Usuario Object ( [id_usuario:Usuario:private] => 2 [nome_usuario:Usuario:private] => Fernando Reis [email:Usuario:private] => freisrj@gmail.com [login:Usuario:private] => freisrj [senha:Usuario:private] => cdj100 [imagem_path:Usuario:private] => /imagem/users/Fernando_02.jpg [status:Usuario:private] => A [created:Usuario:private] => 2016-05-29 02:22:32 [modified:Usuario:private] => ) ) 1


                                    if ($aFun) {

                                        foreach($aFun as $f) {

                                            $f instanceof Funcionario;

                                            $id_fun     = "";
                                            $nome       = "";
                                            $apelido    = "";
                                            $telefone   = "";
                                            $celular    = "";
                                            $funcao     = "";
                                            $endereco   = "";
                                            $bairro     = "";
                                            $cidade     = "";
                                            $cep        = "";
                                            $uf         = "";
                                            $imagem     = "";
                                            $imagem_path = "";

                                            if ($f){
                                                $id_fun     = $f->getIdFun();
                                                $nome       = $f->getNome();
                                                $apelido    = $f->getApelido();
                                                $telefone   = $f->getTelefone();
                                                $celular    = $f->getCelular();
                                                $funcao     = $f->getFuncao();
                                                $endereco   = $f->getEndereco();
                                                $bairro     = $f->getBairro();
                                                $cidade     = $f->getCidade();
                                                $cep        = $f->getCep();
                                                $uf         = $f->getUf();
                                                $imagem     = $f->getImagem();
                                                $imagem_path = $f->getImagemPath();
                                            } 
                                            echo '<tr>';
                                            echo '<td>' . $id_fun . '</td>';
                                            echo '<td>' . $nome . '</td>';
                                            echo '<td>' . $apelido . '</td>';
                                            echo '<td>' . $telefone . '</td>';
                                            echo '<td>' . $celular . '</td>';
                                            echo '<td>' . $funcao . '</td>';
                                            echo '<td>' . $endereco . '</td>';
                                            echo '<td>' . $bairro . '</td>';
                                            echo '<td>' . $cidade . '</td>';
                                            echo '<td>' . $cep . '</td>';
                                            echo '<td>' . $uf . '</td>';
                                            echo '<td>' . $imagem . '</td>';
                                            echo '<td>' . $imagem_path . '</td>';

                                            echo "<td>";
                                            echo "<a href='" . MAINURL . "controle-funcionario/excluir/" . $id_usuario . "/'>Excluir</a>&nbsp;";
                                            echo "<a href='" . MAINURL . "controle-funcionario/editar/" . $id_usuario . "/'>Editar</a>";
                                            //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-funcionario/excluir/" . $id_usuario . "/)' value='Excluir'>";
                                            //echo "<input type='button' action='executaAcao(" . MAINURL . "controle-funcionario/editar/" . $id_usuario . "/)' value='Editar'>";
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
                                <th rowspan="1" colspan="1">Apelido</th>
                                <th rowspan="1" colspan="1">Telefone</th>
                                <th rowspan="1" colspan="1">Celular</th>
                                <th rowspan="1" colspan="1">Função</th>
                                <th rowspan="1" colspan="1">Endereço</th>
                                <th rowspan="1" colspan="1">Bairro</th>
                                <th rowspan="1" colspan="1">Cidade</th>
                                <th rowspan="1" colspan="1">CEP</th>
                                <th rowspan="1" colspan="1">UF</th>
                                <th rowspan="1" colspan="1">Imagem</th>
                                <th rowspan="1" colspan="1">Imagem Caminho</th>
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
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">7</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="8" tabindex="0">8</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="9" tabindex="0">9</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="10" tabindex="0">10</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="11" tabindex="0">11</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="12" tabindex="0">12</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="13s" tabindex="0">13</a></li>
                            <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="14" tabindex="0">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

</section>
<!-- /.content -->
