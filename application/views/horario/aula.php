<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo_header; ?></title>
	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
</head>
<body>
	<!--topo-->
	<div class="app-main">
		<!--
		<h2>
			Este aplicativo encontre-se temporariamente DESATIVADO, por favor acesse o Portal Século para acompanhar o período letivo de seu filho <br> 
			<a href="http://portal.seculomanaus.com.br/FrameHTML/web/app/edu/PortalEducacional/login/">Portal Século Manaus</a>
		</h2>-->

		<div id="tabs_container">
		<div class="header-top">
			<ul class="header-menu">
				<li><a href="#" rel="#seg" class="btn-round tab">Seg</a></li>
				<li><a href="#" rel="#ter" class="btn-round tab">Ter</a></li>
				<li><a href="#" rel="#qua" class="btn-round tab">Qua</a></li>
				<li><a href="#" rel="#qui" class="btn-round tab">Qui</a></li>
				<li><a href="#" rel="#sex" class="btn-round tab">Sex</a></li>
			</ul>
		</div>

		<div class="section tab_contents_container">
			<div id="seg" class="tab_contents fade">
				<div class="content_tab_top">
						<span class="title">SEGUNDA-FEIRA </span>
				</div>	
				<?php 
					foreach($listar as $dados):
					if($dados["DIASEMANA"] == 2):
				?>
				<div class="content_tab_top bg-tap">
						<span> 
							<div class="desc"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div>
							<?= $dados["NOME"]; ?>
						</span>
				</div>
				
				<!--
				<div class="content_tab_main">
					<div class="fieldset">
						<div class="legend"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div>
						<span><?= $dados["NOME"]; ?></span>
					</div>	
				</div>-->
				<?php
					endif;
					endforeach;
				?>

			</div>

			<div id="ter" class="tab_contents fade">
				<div class="content_tab_top">
						<span class="title">TERÇA-FEIRA </span>
				</div>
				<?php 
					foreach($listar as $dados):
					if($dados["DIASEMANA"] == 3):
				?>
				<div class="content_tab_top bg-tap">
						<span> 
						<div class="desc"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div>
						<?= $dados["NOME"]; ?>
						</span>
				</div>
				
				<!--
				<div class="content_tab_main">
					<div class="fieldset">
						 <div class="legend"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div> 
						 <span><?= $dados["NOME"]; ?></span> 
					</div>	
				</div>-->
				<?php
					endif;
					endforeach;
				?>

			</div>

			<div id="qua" class="tab_contents fade">
				<div class="content_tab_top">
						<span class="title">QUARTA-FEIRA</span>
				</div>
				<?php 
					foreach($listar as $dados):
					if($dados["DIASEMANA"] == 4):
				?>
				<div class="content_tab_top bg-tap">
						<span> 
						<div class="desc"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div>
						<?= $dados["NOME"]; ?>
						</span>
				</div>	
				
				<!--
				<div class="content_tab_main">
					<div class="fieldset">
						 <div class="legend"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div> 
						 <span><?= $dados["NOME"]; ?></span>
					</div>	
				</div> -->
				<?php
					endif;
					endforeach;
				?>
			
			</div>


			<div id="qui" class="tab_contents fade">
				<div class="content_tab_top">
						<span class="title">QUINTA-FEIRA</span>
				</div>
				<?php 
					foreach($listar as $dados):
					if($dados["DIASEMANA"] == 5):
				?>
				<div class="content_tab_top bg-tap">
						<span> 
							<div class="desc"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div>
							<?= $dados["NOME"]; ?>
						</span>
				</div>	
				
				<!--
				<div class="content_tab_main">
					<div class="fieldset">
						 <div class="legend"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div> 
						<span><?= $dados["NOME"]; ?></span>
					</div>	
				</div>-->
				<?php
					endif;
					endforeach;
				?>
			
			</div>


			<div id="sex" class="tab_contents fade">
				<div class="content_tab_top">
						<span class="title">SEXTA-FEIRA</span>
				</div>
				<?php 
					foreach($listar as $dados):
					if($dados["DIASEMANA"] == 6):
				?>
				<div class="content_tab_top bg-tap">
						<span> 
							<div class="desc"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div>
							<?= $dados["NOME"]; ?>
						</span>
				</div>
				
				<!--
				<div class="content_tab_main">
					<div class="fieldset">
						 <div class="legend"><?= $dados["HORAINICIAL"]." - ".$dados["HORAFINAL"]; ?></div> 
						<span><?= $dados["NOME"]; ?></span>
					</div>	
				</div>-->
				<?php
					endif;
					endforeach;
				?>
					
			</div>			



		</div>

	

	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script>
		var semana = ["dom", "seg", "ter", "qua", "qui", "sex", "sab"];
		var dataAtual = new Date();
		console.log(semana[dataAtual.getDay()]);
				
		$("#"+semana[dataAtual.getDay()]).addClass("active");
		//$("#"+semana[dataAtual.getDay()]).attr("style","display:block");

		$(".header-menu li a").each(function(){
			rel = $(this).attr("rel").replace("#","");	
			
			if(rel == semana[dataAtual.getDay()]){
				$(".tab_contents").hide();

				$(this).addClass("menu-activo");
				$("#"+rel).addClass("tab_contents_active");
			
				if($("#"+rel).hasClass("tab_contents_active")){
					$(".tab_contents_active").show();
				}
			}

		});
		
	    $("ul.header-menu li a").click(function(){
		    $("li a").removeClass("menu-activo");
		    $(this).addClass("menu-activo");
		});

		// $(".tab_contents").hide();
		$(".btn-round").click(function(e){
			// $(this).addClass("ok");
			var target = $(this.rel);
			// console.log(target);
			$(".tab_contents").not(target).hide();
			target.toggle();
			
			$(".header-menu > .tabs > li.active").removeClass("active");
			$(this).parent().addClass('active');

			$('#tabs_container > .tab_contents_container > div.tab_contents_active').removeClass('tab_contents_active');
		    $(this.rel).addClass('tab_contents_active');

			e.preventDefault();
		});
	</script>
</body>
</html>