<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $titulo_header; ?></title>
	

	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">

</head>
<body>
	<!--topo-->
	<div class="app">
		<div id="modal-bg" class="mensagem"></div>
		<header class="header">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header; ?> <span class="text"> <a href="<?= base_url('cardapio/imprimir/pc'); ?>" target="_blank"><i class="far fa-file-pdf"></i> Abrir PDF</a> </span></h2>
			</div>
			<div class="box right">
				<div class="inline-100">
					<input type="text" id="dc_cardapio" name="dc_cardapio" value="<?= $listar[0]['DC_CARDAPIO']; ?>" class="input-text input-transparent-header">
				</div>
				
			</div>
		</header>
		
		<form method="POST" id="form-1">			
			<table class="tabela-1">
				<thead>
					<tr>
						<td>
							<div class="inline-40">
								<i class="far fa-calendar-alt"></i>
								<input type="text" name="p_dt_ini_validade" id="p_dt_ini_validade" value="<?php echo $dt_inicio; ?>" class="input-transparent-table input-40">	
							</div>

							<div class="inline-40">
								<i class="far fa-calendar-alt"></i>
								<input type="text" name="p_dt_fim_validade" id="p_dt_fim_validade" value="<?php echo $dt_fim; ?>" class="input-transparent-table input-40">
							</div>
						</td>
						<td>Segunda</td>	
						<td>Terça</td>
						<td>Quarta</td>
						<td>Quinta</td>
						<td>Sexta</td>
					</tr>
				</thead>
				<tbody class="itens">
					<?php 
						$id_tipo = 0;
						foreach($listar as $dados): 
					?>
					<?php 	
						if($id_tipo != $dados["ID_TIPO"]): 
					?>
					<tr>
						
						<td colspan="6" class="bg">
							<span><strong><?= $dados['DC_TIPO']; ?></strong></span>
							
							<!--<select id="tipo" name="tipo" class="select" readonly="readonly">
								<option value="<?= $dados['DC_TIPO']; ?>" selected="selected"><?= $dados['DC_TIPO']; ?></option>
							</select>-->
						</td>
					</tr>
					<?php 
						endif; 
					?>
					<tr>
						<td class="b">
							<input type="hidden" name="p_id_tipo" id="p_id_tipo" value="<?= $dados['ID_TIPO']; ?>">
							<input type="hidden" name="p_id_opcao" id="p_id_opcao" value="<?= $dados['ID_OPCAO']; ?>">
							<span><?= $dados['DC_OPCAO']; ?></span>
							<!--<select id="opcao" name="opcao" class="select" readonly="readonly">
								<option value="<?= $dados['DC_OPCAO'] ?>" selected="selected"><?= $dados['DC_OPCAO']; ?></option>
							</select>-->	
						</td>
						<td>
							<textarea maxlength="255" class="textarea textarea-style" id="seg_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>" name="seg_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>"><?= $dados['SEG_DESC']; ?></textarea></td>
						<td>
							<textarea maxlength="255" class="textarea textarea-style" id="ter_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>" name="ter_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>"><?= $dados['TER_DESC']; ?></textarea></td>
						<td>
							<textarea maxlength="255" class="textarea textarea-style" id="qua_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>" name="qua_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>"><?= $dados['QUA_DESC']; ?></textarea></td>
						<td>
							<textarea maxlength="255" class="textarea textarea-style" id="qui_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>" name="qui_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>"><?= $dados['QUI_DESC']; ?></textarea></td>
						<td>
							<textarea maxlength="255" class="textarea textarea-style" id="sex_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>" name="sex_desc_<?= $dados['ID_CARDAPIO_SEMANA']; ?>"><?= $dados['SEX_DESC']; ?></textarea></td>
					</tr>
					<?php 

						$id_tipo = $dados["ID_TIPO"];
					endforeach; 

					?> 
					<tr class="no">
						<td colspan="6">
							<div class="row center">
								<button class="btn btn-link inline padding">Salvar</button> 
								<!-- <a href="javascript:history.back()" class="btn btn-link bg-red inline padding">Voltar</a>  -->
							</div>
						</td>
					</tr>												
				</tbody>
			</table>
		</form>


	</div>
	<style>
		.true{
			background-color: rgb(199, 194, 194);
		}
		.false{
			background-color: rgb(163, 247, 163);
		}
	</style>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script>
		var date2 = new Date();
		date2.setDate(date2.getDate());
		
		$("#p_dt_ini_validade").datepicker({
			dateFormat: 'dd/mm/yy',
			//maxDate: date2,
			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});

		$("#p_dt_fim_validade").datepicker({
			dateFormat: 'dd/mm/yy',
			//maxDate: date2,
			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});


		$(".mensagem").hide();
		$("#form-1").submit(function(e){

			dados 	= $(this).serialize();
			

			$.ajax({
				url: "<?= base_url('cardapio/form_cardapio/update_cardapio'); ?>",
				type: "POST",
				data: dados,
				beforeSend: function(){
					$(".mensagem").show();
					$(".mensagem").html("<h2>Carregando...</h2>");
				},
				success:function(data){

					console.log(data);
					$(".mensagem").show();
					$(".mensagem").html("<h2>"+data+"</h2>");
					$(".mensagem").hide(6000);
				}
			});

			e.preventDefault();
		});
	</script>
	<script src="<?= base_url('assets/js/app.js'); ?>"></script>
</body>
</html>