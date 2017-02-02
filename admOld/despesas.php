<?php include('ent_despesas.php'); ?>
<h3>Despesas Diversas
do Mês <input type="text" size="2" value="<?php echo date('m')?>" id="mesI" />.
 <button onclick="carregar(4,'lisdesp','lisDespesas.'+ 1 )"> <> </button>
 </h3>
<fieldset id="lisdesp">
<?php 
include('lisDespesas.php'); ?>
</fieldset>