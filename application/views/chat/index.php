<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo_header; ?></title>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/chat.css?v=').time() ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<header id="header">
		<div class="title col-80"><?= $nome_usuario; ?></div>
		<!--<div class="back col-20">-->
			<!--<a href="javascript:void(0);" onclick="del_conversa();">
				<i class="far fa-trash-alt"></i>
			</a>-->
			<!--<a href="javascript:void(0);" onclick="voltar(this,'<?= $nome_usuario; ?>');" class="disable"><i class="fas fa-chevron-left"></i></a>-->
		<!--</div>-->
	</header>



	<div class="content-body">
		<section id="content" class="content">
			
			<div id="list-content" class="row">
				<div class="title">Selecione o Departamento</div>
				<ul class="list">
					<li class="list-item">
						<a href="javascript:void(0);" onclick="departamento('<?= $lst_departamento[2]['USU_LOGIN']; ?>','<?= $lst_departamento[2]['NOME']?>');" class="list-link"><?= $lst_departamento[2]['NOME']; ?></a>
					</li>
					<li class="list-item">
						<a href="javascript:void(0);" onclick="departamento('<?= $lst_departamento[0]['USU_LOGIN']; ?>','<?= $lst_departamento[0]['NOME']?>');" class="list-link"><?= $lst_departamento[0]['NOME']; ?></a>
					</li>
					<li class="list-item">
						<a href="javascript:void(0);" onclick="departamento('<?= $lst_departamento[1]['USU_LOGIN']; ?>','<?= $lst_departamento[1]['NOME']?>');" class="list-link"><?= $lst_departamento[1]['NOME']; ?></a>
					</li>

				
					<?php
					 #foreach($lst_departamento as $info_departamento): 
					?>
					<!-- <li class="list-item">
						<a href="javascript:void(0);" onclick="departamento('<?= $info_departamento['USU_LOGIN']; ?>','<?= $info_departamento['NOME']?>');" class="list-link"><?= $info_departamento['NOME']; ?></a>
					</li> -->
					<?php #endforeach; ?>
				</ul>
			</div>		

		



			<audio></audio>
		</section>
	</div>


	<footer id="footer-top" class="disable teclado">
			<div class="row flex">
				<div class="item-flex">
					<input type="hidden" name="txt_usuario" id="txt_usuario" value="<?= $nome_usuario; ?>">
					<input type="hidden" name="txt_codusuario" id="txt_codusuario" value="<?= $codusuario; ?>">
					
					<input type="hidden" name="txt_codusuario_destino" id="txt_codusuario_destino">
					<input type="hidden" name="txt_departamento" id="txt_departamento" value="<?= $codusuario; ?>"> 

					<textarea name="txt_mensagem" id="txt_mensagem" class="txt_mensagem" placeholder="Digite sua dúvida..."></textarea>
				</div>
				<div class="item-flex">
					<button class="btn_enviar" id="btn_enviar" onclick="execMessages();"><i class="fas fa-location-arrow"></i></button>
					<button class="btn_esconder" onclick="esconder_msg();"><i class="far fa-comment-dots"></i></button>
				</div> 
			</div>
	</footer>

	<!-- <div class="teclado" id="teclado">
		<div class="caixa">
			<div class="row flex">
				<div class="item-flex">
					<input type="hidden" name="txt_usuario" id="txt_usuario" value="<?= $nome_usuario; ?>">
					<input type="hidden" name="txt_codusuario" id="txt_codusuario" value="<?= $codusuario; ?>">
					
					<input type="hidden" name="txt_codusuario_destino" id="txt_codusuario_destino">
					<input type="hidden" name="txt_departamento" id="txt_departamento" value="<?= $codusuario; ?>">

					<textarea name="txt_mensagem" id="txt_mensagem" class="txt_mensagem" placeholder="Digite sua dúvida..."></textarea>
				</div>
				<div class="item-flex">
					<button class="btn_enviar" id="btn_enviar" onclick="execMessages();"><i class="fas fa-location-arrow"></i></button>
				</div>
			</div>
		</div>
		 <div class="teclas">
			<div class="alfabeto enable">
				<span>q</span>
				<span>w</span>
				<span>e</span>
				<span>r</span>
				<span>t</span>
				<span>y</span>
				<span>u</span>
				<span>i</span>
				<span>o</span>
				<span>p</span>
				<span>a</span>
				<span>s</span>
				<span>d</span>
				<span>f</span>
				<span>g</span>
				<span>h</span>
				<span>j</span>
				<span>k</span>
				<span>l</span>
				<span>z</span>
				<span>x</span>
				<span>c</span>
				<span>v</span>
				<span>b</span>
				<span>n</span>
				<span>m</span>
				<span class="backspace"><</span>
				<span class="width-20">-</span>
				<span>,</span>
				<span>.</span>
				<span class="bg-btn-destaque">?12</span>
			</div>
			<div class="numero disable">
				<span>0</span>
				<span>1</span>
				<span>2</span>
				<span>3</span>
				<span>4</span>
				<span>5</span>
				<span>6</span>
				<span>7</span>
				<span>8</span>
				<span>9</span>
				<span class="backspace"><</span>
				<span>.</span>
				<span>,</span>
				<span>R$</span>
				<span class="width-20">-</span>
				<span class="bg-btn-destaque">?ab</span>
			</div>
		</div> 
	</div> -->
	<style>
		.content-body{
			height: 100vh;
			overflow:auto;
			/*background-color: blue;*/
		}
		.teclado{
			display: none;
			width: 100%;
			padding: 0;
		}
		.ativo-teclado{
			width: 100%;
			position: absolute;
			top: 50px;
			left:0;
			display: block;
			height: 100% !important;
			/*overflow: hidden;*/
		}
		.ativo-teclado .txt_mensagem{
			height:80vh !important;
			border-radius:6px !important;
		}
		.caixa{
			background-color: transparent;
			padding: 10px 15px;
		}
		.teclas{
			padding:10px;
			background-color: #D2D6DB;
			text-align: center;
		}
		.teclas span {
			display: inline-block;
			position: relative;
			background: #FFFFFF;
			color:#333;
			font-size: 1rem;
			cursor: pointer;
			width: 35px;
			height: 35px;
			border-radius: 5px;
			margin: 3.5px;
			color: #333;
			font-weight: bold;
			line-height: 35px;
			text-align: center;
			box-shadow: 1px 1px 1px #c4c4c4;
		}
		.teclas span:hover,
		.teclas span:hover.backspace::after{
			background-color: #3471BB !important;
			color:#FFF !important;
		}
		.uppercase{
			text-transform: uppercase;
		}
		.bg-btn-destaque{
			background-color: #1A2D44 !important;
			color:#FFF !important;
		}
		.width-20{
			width: 30% !important;
		}
		.backspace{
			position: relative;
			display: none;
		}
		.backspace::after{
			font-family: "Font Awesome 5 Free";
			content: '\f55a';
			position: absolute;
			color:#333;
			left:50%;
			transform: translateX(-50%);
			z-index: 9;
		}
	</style>
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/app-chat.js'); ?>"></script>
	<script>

		$(".back i").hide();

		function esconder_msg(){
			$(".teclado").removeClass("ativo-teclado");
		}

		/*function scroll_content(){
			console.log("ok");
		}*/

		$(function(){		
			//ativa o teclado
			$("#txt_mensagem").click(function(e){
				$(".teclado").addClass("ativo-teclado");
				
				if($(".teclado").hasClass("ativo-teclado")){
					$(".btn_esconder").show();
					console.log("teclado ativo");
				}else{
					$(".btn_esconder").hide();
					console.log("teclado desativado");
				}
				e.preventDefault();
			});

			if(!$(".teclado").hasClass("ativo-teclado")){
				$(".btn_esconder").hide();
			}
			

			$(".btn_esconder").click(function(){
				if($(".teclado").hasClass("ativo-teclado")){
					$(".btn_esconder").show();
					console.log("teclado ativo");
				}else{
					$(".btn_esconder").hide();
					console.log("teclado desativado");
				}
			});

			//desativa o teclado
			$("#content").click(function(e){
				$(".teclado").removeClass("ativo-teclado");
				//$("#txt_mensagem_1").val($("#txt_mensagem").val());				
			});

		
			// $(document).on("load","#content",function(e){
				// console.log("ok");
				// var div = $(this)[0];
				// div.scrollTop = div.scrollHeight;

			// 	e.preventDefault();
			// });
	

			//caracteres do teclado
		// 	$('#teclado .alfabeto span, #teclado .numero span').click(function(){
		//       var pos = $('#txt_mensagem').get(0).selectionStart;
		//       var val = $('#txt_mensagem').val();
		//       var palavra = $(this).text();
		//       if (palavra == ''){
		//         $('#txt_mensagem').val(val.substr(0, val.length - 1)).focus();
		//       } else {
		//       	if(palavra == '-'){
		//       		$('#txt_mensagem').val(val.substr(0,pos) + ' ' + val.substr(pos)).focus().get(0).setSelectionRange(pos+1, pos+1);	
		//       	}else{
		//       		$('#txt_mensagem').val(val.substr(0,pos) + palavra + val.substr(pos)).focus().get(0).setSelectionRange(pos+1, pos+1);	
		//       	}

		//         if(palavra == '?12'){
		//             $('#txt_mensagem').val(val.substr(0, val.length - 1)).focus();
		//         	$(".numero").removeClass("disable");
		//         	$(".numero").addClass("enable");

		//         	$(".alfabeto").removeClass("enable");
		//         	$(".alfabeto").addClass("disable");
		        	

		//         	//$('#teclado .teclas').addClass('uppercase');
		//         	return false;
		//         }

		//         if(palavra == '?ab'){
		//         	$('#txt_mensagem').val(val.substr(0, val.length - 1)).focus();
		//         	$(".numero").addClass("disable");
		//         	$(".numero").removeClass("enable");
		//         	$(".alfabeto").addClass("enable");
		//         	$(".alfabeto").removeClass("disable");

		//         }

		//       }

		//       //apaga caracter
		//       if(palavra == '<'){
		// 			$('#txt_mensagem').val(val.substr(0, val.length - 1));
		// 			return false;
		//       }
		//    });

		

		});
	</script>

</body>
</html>