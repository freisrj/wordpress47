<?php

// cria objeto de dados de usuário
//$dl = new DaoLogin();
// Lista todos os registros de usuário
//$aLog = $dl->listarTodos();
//echo print_r($aLog[0]);
//var_dump($aLogin);

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

                <div class="col-sm-10">

                    <form class="form-horizontal">

                        <div class="form-group">
                            
                            <label for="inputName" class="col-sm-2 control-label">Funcionário</label>
                            <div class="col-sm-4">
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option selected="selected">Fernando Reis</option>
                                  <option>Nome 2</option>
                                  <option>Nome 3</option>
                                  <option>Nome 4</option>
                                  <option>Nome 5</option>
                                </select>
                                <!--
                                <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;">
                                    <span class="selection">
                                        <span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-nv5l-container">
                                            <span class="select2-selection__rendered" id="select2-nv5l-container" title="Fernando Reis">Fernando Reis</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                                -->
                                <input type="hidden" id="inputId">
                                <input type="hidden" id="inputIdFun">
                            </div>

                            <label for="inputUnidade" class="col-sm-2 control-label">Unidade</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="inputUnidade">
                                    <option>1 - Rio</option>
                                    <option>2 - Niterói</option>
                                    <option>3 - Rio-Mix</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAcesso" class="col-sm-2 control-label">Nível de acesso</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="inputAcesso">
                                    <option>1 - Administrador</option>
                                    <option>2 - Usuário</option>
                                </select>
                            </div>
                            <label for="inputLogin" class="col-sm-2 control-label">Login</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputLogin" placeholder="Login">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="inputSenha" placeholder="Senha">
                            </div>
                            <label for="inputConfirmeSenha" class="col-sm-2 control-label">Confirme a Senha</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="inputConfirmeSenha" placeholder="Confirme a Senha">
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Id: activate to sort column ascending" style="width: 30px;">Id</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Funcionário: activate to sort column ascending" style="width: 260px;">Funcionário</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Login: activate to sort column ascending" style="width: 150px;">Login</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Unidade: activate to sort column ascending" style="width: 73px;">Unidade</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Acesso: activate to sort column ascending" style="width: 90px;">Acesso</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 170px;">Controles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role='row' class='odd'>"<td></td></tr>
                             <?php

                                //if (count($aLog)>0) {
                                // //if ($aLog) {

                                    // foreach($aLog as $login) {

                                    //     $login instanceof Login;

                                    //     $id      = $login->getId();
                                    //     $login   = $login->getLogin();
                                    //     $nome    = $login->getFuncionario()->getNome();
                                    //     $acesso  = $login->getAcesso();
                                    //     $unidade = $login->getUnidade();

                                    //     echo "<tr role='row' class='odd'>";
                                    //     echo "<td>" . $id . "</td>";
                                    //     echo "<td class='sorting_2'>" . $nome . "</td>";
                                    //     echo "<td>" . $login . "</td>";
                                    //     echo "<td class='sorting_1'>" . $unidade . "</td>";
                                    //     echo "<td>" . $acesso . "</td>";

                                    //     echo "<td>";
                                    //     echo "<button type='button' class='btn btn-info btn-xs' src='" . MAINURL . "controle-login/historico/" . $id . "/'><i class='fa fa-fw fa-history'></i>Histórico</button>";
                                    //     echo "<button type='button' class='btn btn-success btn-xs' src='" . MAINURL . "controle-login/editar/" . $id . "/'><i class='fa fa-fw fa-edit'></i>Editar</button>";
                                    //     echo "<button type='button' class='btn btn-danger btn-xs' src='" . MAINURL . "controle-login/editar/" . $id . "/'><i class='fa fa-fw fa-eraser'></i>Excluir</button>";
                                    //     echo "</td>";
                                    //     echo "</tr>";
                                    // }
                                //}
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

