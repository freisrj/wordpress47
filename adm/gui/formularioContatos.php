<?php 

// $sqlb = "SELECT * FROM wd_contato
// 			ORDER BY id_cot DESC, data DESC";
// $queryb = mysql_query($sqlb); $lin = 1;
// $tot = mysql_num_rows($queryb);
// while( $resb=mysql_fetch_array($queryb) ){
// 	echo '<tr>';
// 	echo "<td>" . $resb['id_cot'] . '</td>';
// 	$dat = explode('-',$resb['data']);
// 	$data = $dat[2].'/'.$dat[1].'/'.$dat[0];
// 	echo "<td>" . $data . '</td>';
// 	echo "<td>" . $resb['nome'] . '</td>';
// 	echo "<td>" . $resb['email'] . '</td>';
// 	echo "<td>" . $resb['mensagem'] . '</td>';
// 	echo '</tr>';
// 	$lin++;
// }



//session_start();
//include_once("/phpMVC/seguranca.php");

$id_cot   = '';
$data     = '';
$nome     = '';
$email    = '';
$mensagem = '';

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

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Formulário de Contato</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-sm-10">

                <form class="form-horizontal">

                    <div class="form-group">
                        <label for="inputNome" class="col-sm-2 control-label">Contato</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNome" placeholder="Contato">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputMensagem" class="col-sm-2 control-label">Mensagem</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputMensagem" rows="3" placeholder="Entre com a Mensagem"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputResposta" class="col-sm-2 control-label">Resposta</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputResposta" rows="3" placeholder="Entre com a Resposta"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-fw fa-check"></i>Confirmar</button>
                            <button type="button" class="btn btn-default pull-right"><i class="fa fa-fw fa-close"></i>Cancelar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.box-body -->

        <!--
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div>

    <!--
    <div class="box box-primary">
        <div class="panel-body">

            <div class="row">

                <div class="col-sm-10">

                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Contato</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNome" placeholder="Contato">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputMensagem" class="col-sm-2 control-label">Mensagem</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputMensagem" rows="3" placeholder="Entre com a Mensagem"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputResposta" class="col-sm-2 control-label">Resposta</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputResposta" rows="3" placeholder="Entre com a Resposta"></textarea>
                            </div>
                        </div>

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
    -->

    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-4">
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

                <div class="col-sm-8">
                    <div id="example1_filter" class="col-sm-8">
                        <label>
                            <i class="fa fa-fw fa-search"></i>
                        </label>
                        <input type="search" class="form-control input-sm" placeholder="Pesquisar" aria-controls="example1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Id: activate to sort column ascending" style="width: 50px;">Id</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Data: activate to sort column ascending" style="width: 120px;">Data</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending" style="width: 260px;">Nome</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 150px;">E-mail</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mensagem: activate to sort column ascending" style="width: 120px;">Mensagem</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Data Resp: activate to sort column ascending" style="width: 120px;">Data Resp</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Resposta: activate to sort column ascending" style="width: 150px;">Resposta</th>
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 160px;">Controles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role='row' class='odd'>"<td></td></tr>
                             <?php
                                // cria objeto de dados de usuário
                                //$df = new DaoFuncionario();
                                // Lista todos os registros de usuário
                                //$aFun = $df->listarTodos();

                                // como o método listar usuários já foi chamado basta pegar o resultado da lista e colocar em um objeto
                                //$aFun = $this->getDados("funcionarios");
                                //echo print_r($aFun);


                                /*
                                //if (count($aFun)>0) {
                                if ($aFun) {

                                    foreach($aFun as $funcionario) {

                                        $funcionario instanceof Funiconario;

                                        $id_cot      = '';
                                        $nome   = '';
                                        $celular    = '';
                                        $telefone  = '';
                                        $funcao = '';

                                        if ($login){
                                            $id     = $funcionario->getIdCot();
                                            $nome           = $funcionario->getNome();
                                            $email          = $funcionario->getEmail();
                                            $webmail        = $funcionario->getWebmail();
                                            $mensagem       = $funcionario->getMensagem();
                                            $data           = $funcionario->getData();
                                            $resposta       = $funcionario->getResposta();
                                            $dataResposta   = $funcionario->getDataResposta();
                                        } 
                                        echo "<tr role='row' class='odd'>";
                                        echo "<td>" . $id . "</td>";
                                        echo "<td class='sorting_1'>" . $data . "</td>";
                                        echo "<td class='sorting_2'>" . $nome . "</td>";
                                        echo "<td>" . $email . "</td>";
                                        echo "<td>" . $mensagem . "</td>";
                                        echo "<td>" . $dataResposta . "</td>";
                                        echo "<td>" . $resposta . "</td>";

                                        echo "<td>";
                                        echo "<button type='button' class='btn btn-success btn-xs' src='" . MAINURL . "controle-funcionario/editar/" . $id_fun . "/'><i class='fa fa-fw fa-edit'></i>Editar</button>"
                                        echo "<button type='button' class='btn btn-danger btn-xs' src='" . MAINURL . "controle-funcionario/editar/" . $id_fun . "/'><i class='fa fa-fw fa-eraser'></i>Excluir</button>"
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                */
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
