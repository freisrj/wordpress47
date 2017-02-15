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

    <div class="box box-primary">
        <div class="panel-body">

            <div class="row">

                <div class="col-sm-9">

                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Contato</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputNome" placeholder="Contato">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputMensagem" class="col-sm-2 control-label">Mensagem</label>
                            <div class="col-sm-8">
                                <input type="textarea" class="form-control" id="inputMensagem" placeholder="Mensagem">
                            </div>
                        </div>

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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Data: activate to sort column ascending" style="width: 161px;">Data</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending" style="width: 150px;">Nome</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 176px;">E-mail</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mensagem: activate to sort column ascending" style="width: 137px;">Mensagem</th>
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 160px;">Controles</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php

                                    // como o método listar usuários já foi chamado basta pegar o resultado da lista e colocar em um objeto
                                    $aCont = $this->getDados("contatos");
                                    //echo print_r($aUsu);
                                    //Array ( [0] => Usuario Object ( [id_usuario:Usuario:private] => 2 [nome_usuario:Usuario:private] => Fernando Reis [email:Usuario:private] => freisrj@gmail.com [login:Usuario:private] => freisrj [senha:Usuario:private] => cdj100 [imagem_path:Usuario:private] => /imagem/users/Fernando_02.jpg [status:Usuario:private] => A [created:Usuario:private] => 2016-05-29 02:22:32 [modified:Usuario:private] => ) ) 1


							        if ($aCont) {

							            foreach($aCont as $contato) {

							                $contato instanceof Contato;

											$id_cot   = '';
											$data     = '';
											$nome     = '';
											$email    = '';
											$mensagem = '';
							                
							                if ($contato){
							                    $id_cot   = $contato->getIdCot());
												$data     = $contato->getData();
							                    $nome     = $contato->getNome();
							                    $email    = $contato->getEmail();
												$mensagem = $contato->getMensagem();
							                } 
							                ?>

				                            <tr role="row" class="odd">
				                                <td class=""><?php echo $id_cont;?></td>
				                                <td class="sorting_1"><?php echo $data;?></td>
				                                <td class=""><?php echo $nome;?></td>
				                                <td class=""><?php echo $email;?></td>
				                                <td class=""><?php echo $mensagem;?></td>
				                                <td>
				                                    <button type="button" class="btn btn-success btn-xs"><i class="fa fa-fw fa-edit" href="controle-contato/editar/<?php echo $id_cont;?>"></i>Editar</button>
				                                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-eraser" href="controle-contato/excluir/<?php echo $id_cont;?>"></i>Excluir</button>
				                                </td>
				                            </tr>

							                <?php 
							            }
							        }
                                    ?>
                        </tbody>
                        <!--
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Id</th>
                                <th rowspan="1" colspan="1">Funcionario</th>
                                <th rowspan="1" colspan="1">Login</th>
                                <th rowspan="1" colspan="1">Senha</th>
                                <th rowspan="1" colspan="1">Acesso</th>
                                <th rowspan="1" colspan="1">Unidade</th>
                                <th rowspan="1" colspan="1">Ações</th>
                            </tr>
                        </tfoot>
                    	-->
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
