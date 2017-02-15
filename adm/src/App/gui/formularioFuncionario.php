<?php

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


// $f = $this->getDados("funcionario");
// //echo print_r($funcionario);

// if ($f){
//     $f instanceof Login;
//     $id_fun     = $f->getIdFun();
//     $nome       = $f->getNome();
//     $apelido    = $f->getApelido();
//     $telefone   = $f->getTelefone();
//     $celular    = $f->getCelular();
//     $funcao     = $f->getFuncao();
//     $endereco   = $f->getEndereco();
//     $bairro     = $f->getBairro();
//     $cidade     = $f->getCidade();
//     $cep        = $f->getCep();
//     $uf         = $f->getUf();
//     $imagem     = $f->getImagem();
//     $imagem_path = $f->getImagemPath();
// }
?> 

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $_POST['titulo']; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="controle-login/principal"><i class="fa fa-home"></i> Home</a></li>
        <li> Configurações</li>
        <li class="active">
            <?php echo $_POST['titulo']; ?>
        </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="panel-body">

            <div class="row">

                <div class="col-sm-2 pull-left">
                    <div class="form-group">
                        <div class="col-sm-14">
                            <img src="/phpMVC/img/users/avatar.jpg" class="img-circle" alt="Imagem do Funcionário">
                            <button type="submit" class="btn bg-navy btn-lg"><i class="fa fa-fw fa-upload"></i>Alterar foto</button>
                            
                            <!--<label for="InputFile">Alterar foto</label>
                            <input type="file" id="InputFile">
                            <p class="help-block">Escolha um arquivo para alterar a foto do funcionário.</p>-->

                        </div>


                    </div>
                </div>


                <div class="col-sm-10">


                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputName" placeholder="Nome do Funcionário">
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
                                <input type="text" class="form-control" id="inputCelular" placeholder="Celular">
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
                                <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-fw fa-check"></i>Confirmar</button>
                                <button type="button" class="btn btn-default pull-right"><i class="fa fa-fw fa-close"></i>Cancelar</button>
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
                            Mostrar
                            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> registros
                        </label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>
                            <i class="fa fa-fw fa-search"></i>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending" style="width: 260px;">Nome</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="E-Apelido: activate to sort column ascending" style="width: 150px;">Apelido</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Telefone: activate to sort column ascending" style="width: 120px;">Telefone</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Celular: activate to sort column ascending" style="width: 120px;">Celular</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Função: activate to sort column ascending" style="width: 150px;">Função</th>
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 160px;">Controles</th>
                            </tr>
                        </thead>
                        <tbody>

                             <?php
                                // cria objeto de dados de usuário
                                $df = new DaoFuncionario();
                                // Lista todos os registros de usuário
                                $aFun = $df->listarTodos();

                                // como o método listar usuários já foi chamado basta pegar o resultado da lista e colocar em um objeto
                                //$aFun = $this->getDados("funcionarios");
                                //echo print_r($aLog);


                                if ($aFun) {

                                    foreach($aFun as $funcionario) {

                                        $funcionario instanceof Funiconario;

                                        $id_fun      = '';
                                        $nome   = '';
                                        $celular    = '';
                                        $telefone  = '';
                                        $funcao = '';

                                        if ($login){
                                            $id_fun     = $funcionario->getIdFun();
                                            $nome   = $funcionario->getNome();
                                            $telefone   = $funcionario->getTelefone();
                                            $celular  = $funcionario->getCelular();
                                            $funcao = $funcionario->getFuncao();
                                        } 
                                        echo "<tr role='row' class='odd'>";
                                        echo "<td>" . $id_fun . "</td>";
                                        echo "<td class='sorting_1'>" . $nome . "</td>";
                                        echo "<td>" . $telefone . "</td>";
                                        echo "<td>" . $celular . "</td>";
                                        echo "<td>" . $funcao . "</td>";

                                        echo "<td>";
                                        echo "<button type='button' class='btn btn-success btn-xs' src='" . MAINURL . "controle-funcionario/editar/" . $id_fun . "/'><i class='fa fa-fw fa-edit'></i>Editar</button>"
                                        echo "<button type='button' class='btn btn-danger btn-xs' src='" . MAINURL . "controle-funcionario/editar/" . $id_fun . "/'><i class='fa fa-fw fa-eraser'></i>Excluir</button>"
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">1 a 10 de 57 registros</div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Anterior</a></li>
                            <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li>
                            <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Próximo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

</section>
<!-- /.content -->

