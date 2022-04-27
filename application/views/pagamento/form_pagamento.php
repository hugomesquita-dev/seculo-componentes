<!--topo-->
<div class="app-main" id="conteudoModal">
	<header class="header-top">
		<div class="box left">
			<h2 class="header-title"><?= $titulo_header_1; ?></h2>		
		</div>
		<div class="box right">
		<?php 

			$arr_aluno = explode(",", $listar);	
			  foreach($arr_aluno as $aluno):
			 	$arr_item = explode(":", $aluno);
			 	// echo $arr_item[0];
			// 	$nome_aluno 	= $arr_item[0];
			// 	$qtd_itens 		= $arr_item[1];
			// 	$preco_item 	= $arr_item[2];
			// 	$total_item 	= $arr_item[3];
			// 	$total_compra 	= $arr_item[4];


		?>
			<!--<input type="text" id="nomeAluno" name="nomeAluno" value="<?= $nome_aluno; ?>">
			<input type="text" id="qtdItens" name="qtdItens" value="<?= $qtd_itens; ?>">
			<input type="text" id="precoItem" name="precoItem" value="<?= $preco_item; ?>">
			<input type="text" id="totalItem" name="totalItem" value="<?= $total_item; ?>">
			<input type="text" id="totalCompra" name="totalCompra" value="<?= $total_compra; ?>">-->

		<?php 
			endforeach;
		?>

			<a href="#" class="btn_x_modal_grande" onclick="fecharpopup('<?= $arr_item[0]; ?>'); return false;"><i class="fas fa-times"></i></a>
		</div>
	</header>
		
	<form method="POST">

		<!--LISTA DE ALUNOS E ITENS-->
		<input type="hidden" name="produtosArray" id="produtosArray" value="<?= $listar; ?>">

		<div class="row margin padding margin-50-center" style="overflow: auto;">
			<div class="row-50">
				<select id="formaPagamento" name="formaPagamento" class="drop-select" required>
					<!-- <option value="0">Selecione o Tipo de Pagamento</option>
					<option value="0">-----</option>
					<option value="A"><i class="fas fa-credit-card"></i>Débito</option> -->
                    <option value="1" selected="selected">Crédito à Vista</option>    
				</select>
			</div>
			<div class="row-50 text-right">
				<select id="codigoBandeira" name="codigoBandeira" class="drop-select" required>
					<option value="0" selected="selected">Selecione a Bandeira</option>
					<option value="0">-----</option>
					<option value="visa">Visa</option>
					<option value="mastercard">MasterCard</option>
					<!--<option value="elo">Elo</option>-->
					<!--<option value="amex">Amex</option>-->
					<!-- <option value="discover">Discover</option> -->
					<!-- <option value="aura">Aura</option>
						 <option value="disners">Disners</option> -->
				</select>
			</div>	
			<div class="row-60">
				<input type="number" 
						name="numeroCartao" 
					   	id="numeroCartao" 
					   	maxlength="16"
                       	required
                       	placeholder="Número do Cartão" 
                       	class="input-text input-80">

<!-- 				<input type="number" 
						name="numeroCartao" 
					   	id="numeroCartao" 
					   	maxlength="16"
                       	required
                       	placeholder="Número do Cartão" 
                       	class="input-text input-80" 
                       	onkeypress="return somenteNumeros(event, 16, 'numeroCartao')" 
                       	onkeyup="return somenteNumeros(event, 16, 'numeroCartao')"> -->

                       	 <!--onkeyup="cardNumber(this.value);" pattern="([0-9]{16})"-->
            </div>
			<div class="row-20 margin-left text-right">
				<input type="hidden" 
						name="Vencimento" 
						id="Vencimento"
						maxlength="8" 
						required 
						placeholder="MM/YYYY" 
						class="input-text input-95">
				<strong>Data de Vencimento</strong>
				<select name="Mes" id="Mes" class="select-50">
				  <option value="0">Mês</option>
				  <option value="01">01</option>
				  <option value="02">02</option>
				  <option value="03">03</option>
				  <option value="04">04</option>
				  <option value="05">05</option>
				  <option value="06">06</option>
				  <option value="07">07</option>
				  <option value="08">08</option>
				  <option value="09">09</option>
				  <option value="10">10</option>
				  <option value="11">11</option>
				  <option value="12">12</option>
				</select>
				<select name="Ano" id="Ano" class="select-50">
				  <option value="0">Ano</option>
				  <option value="2020">2020</option>
				  <option value="2021">2021</option>
				  <option value="2022">2022</option>
				  <option value="2023">2023</option>
				  <option value="2024">2024</option>
				  <option value="2025">2025</option>
				  <option value="2026">2026</option>
				  <option value="2027">2027</option>
				  <option value="2028">2028</option>
				  <option value="2029">2029</option>
				  <option value="2030">2030</option>
				</select>			
			</div>
			<div class="row-20 margin-left text-right">
				<!-- <input type="number" 
						name="Cvv" 
						id="Cvv" 
						placeholder="CVV"
						required
                        placeholder="0000"
                        maxlength="4" 
						class="input-text input-95" onkeypress="return somenteNumeros(event, 4, 'Cvv')" onkeyup="return somenteNumeros(event, 4, 'Cvv')"> -->

					<input type="number" 
						name="Cvv" 
						id="Cvv" 
						placeholder="CVV"
						required
                        placeholder="0000"
                        maxlength="4" 
						class="input-text input-95">	
			</div>
			<div class="row-95">
				<input type="text"
						name="Nome" 
						id="Nome" 
						required
						maxlength="50"
						placeholder="Nome Completo" 
						class="input-text input-95">
			</div>
			<div class="box-bottom">
				<input type="hidden" name="valorTotal" id="valorTotal" value="<?= number_format($arr_item[6],2,",","."); ?>">
				<div class="vfloat padding">R$ <?= number_format($arr_item[6],2,",","."); ?></div>
				<button onclick="conteudoModal('<?= base_url('pagamento/requisitar_transacao/index'); ?>'); return false;" class="btn btn-link bg-green padding block margin-center">Pagar</button>
			</div>
		</div>
	</form>

</div>	

<script>
	//Expressão Regular apenas p/ números do CARTÃO
/*	
onkeyup="cardNumber(this.value);"
onkeyup="dateVencimento(this.value);"*/

function cardNumber(valor){
	var regexp = /^[0-9]+$/;
	if(valor.match(regexp)){
		return true;
	}else{
		alert("Digite apenas Números");
		$("#numeroCartao").val(valor.substring(0, valor.length - 1));
		return false;
	}
}

function somenteNumeros(e, quantidade, id) {
    var charCode = e.charCode ? e.charCode : e.keyCode;
    // charCode 8 = backspace   
    // charCode 9 = tab
   if (charCode != 8 && charCode != 9) {
       // charCode 48 equivale a 0   
       // charCode 57 equivale a 9
       var max = quantidade;
       var num = document.getElementById(id);  
            
       if ((charCode < 48 || charCode > 57)||(num.value.length >= max)) {
          return false;
       }
       
    }
}


$(document).on("keydown","#Cvv", function(e) {
	 // console.log("codigo: "+charCode);
	if($(this).val().length >= 4 && e.keyCode != 8 && e.keyCode != 9){					//$(this).val(this.value.replace(/\D/g, ''));
		return false;
	}
});


$(document).on("keydown","#numeroCartao", function(e) {
	 // console.log("codigo: "+charCode);
	if($(this).val().length >= 16 && e.keyCode != 8 && e.keyCode != 9){					//$(this).val(this.value.replace(/\D/g, ''));
		return false;
	}
});


/*$('.date-picker').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm/yy',
        locale: 'pt-br',
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
   monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
   nextText: 'Proximo',
   prevText: 'Anterior',
        onClose: function (dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });

function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function data(v){
	v=v.replace(/\D/g,"");					//Remove tudo o que não é dígito
	v=v.replace(/(\d{2})(\d)/,"$1/$2");	   
	v=v.replace(/(\d{2})(\d)/,"$1/$2");	   
											 
	v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
	return v;
}*/
</script>