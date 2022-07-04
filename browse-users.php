<!---TABELA PRINCIPAL DE VISUALIZAR O CRUD EDITAR  ETC--->
<?php include_once('config.php');?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8"S>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP CRUD Pesquisar</title>
	
	<!--<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico"> esse e o icon --->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
			<nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand text-muted p-0 m-0" href="#"></a> <!--caso queira adiciona imagem so muda campo acima--->					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						
						<form method="get" action="#" class="form-inline my-2 my-lg-0">
							<!--link desse crud https://learncodeweb.com-->
							<div class="input-group input-group-md">
								<!---<input type="text" class="form-control search-width" name="s" id="search" value="" placeholder="pesquisa barra menu de navegaçao..." aria-label="Search">--->
								<div class="input-group-append">
									<!----<button type="submit" class="btn btn-primary" id="searchBtn"><i class="fa fa-search"></i></button>--->
								</div>
							</div>
						</form>
					</div>
				</nav>
			</header>
		</div> <!--/.container-->
	</div>
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['nome']) and $_REQUEST['nome']!=""){
		$condition	.=	' AND nome LIKE "%'.$_REQUEST['nome'].'%" ';
	}
	if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
		$condition	.=	' AND email LIKE "%'.$_REQUEST['email'].'%" ';
	}
	if(isset($_REQUEST['telefone']) and $_REQUEST['telefone']!=""){
		$condition	.=	' AND telefone LIKE "%'.$_REQUEST['telefone'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('dadoscliente','*',$condition,'ORDER BY id DESC');
	?>
   	<div class="container">
		<h1><a href="#">PHP CRUD em Bootstrap Pesquisa </a></h1>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Procurar cliente</strong> <a href="add-dadoscliente.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Adicionar clientes</a></div>
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Registro excluído com sucesso!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Registro atualizado com sucesso!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Você não fez nenhuma alteração!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Há alguma coisa errada.<strong>Por favor, tente de novo!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Encontrar cliente</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Nome do usuário	</label><!----pesquisa por usuario--->
									<input type="text" name="nome" id="nome" class="form-control" value="<?php echo isset($_REQUEST['nome'])?$_REQUEST['nome']:''?>" placeholder="Digite o cliente">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>E-mail do cliente</label>
									<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($_REQUEST['email'])?$_REQUEST['email']:''?>" placeholder="Digite o E-mail">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Telefone do cliente</label>
									<input type="tel" name="telefone" id="telefone" class="form-control" value="<?php echo isset($_REQUEST['telefone'])?$_REQUEST['telefone']:''?>" placeholder="Digite o telefone">
								</div>
							</div>
							<div class="col-sm-4">

								<div class="form-group">

									<label>    Data 	</label>
									<div class="input-group">
										<input type="text" class="fromDate form-control hasDatepicker" name="df" id="df" value="" placeholder="a partir de">
										<div class="input-group-prepend"><span class="input-group-text">-</span></div>
										<input type="text" class="toDate form-control hasDatepicker" name="dt" id="dt" value="" placeholder="até a data">
										<div class="input-group-append"><span class="input-group-text"><a href="javascript:;" onclick="$('#df,#dt').val('');"><i class="fa fa-fw fa-sync"></i></a></span></div>
									</div>

								</div>

							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Pesquisar</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Limpar</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
					    <!--<th>Sr#</th>---> 
						<th>ID</th> <!----nome dos campos da tabela exemplo nome  idade  e-maail da tabela crud editar e deletar--->
						<th>Nome do cliente</th>
						<th>E-mail do cliente</th>
						<th>Telefone do cliente</th>
						<th class="text-center">Data do registro</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<!--<td><php echo $s;?></td>--->
						<td><?php echo $val['id'];?></td>
						<td><?php echo $val['nome'];?></td>
						<td><?php echo $val['email'];?></td>
						<td><?php echo $val['telefone'];?></td>
						<td align="center"><?php echo date('Y-m-d',strtotime($val['dt']));?></td>
						<td align="center">
							<a href="edit-dadoscliente.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | <!---botao de editar-->
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">Nenhum registro(s) encontrado! /No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			jQuery(function($){
				  var input = $('[type=tel]')
				  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
				  input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				  })
			 });
			 
			 //From, To date range start
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			//De, Até a faixa de data Fim aqui/From, To date range End here	
			
		});
	</script>
</body>
</html>
