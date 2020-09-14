<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body >
<div class ='container'  >
	<h1 class="text-center">Lista de Compras</h1>
	<div class="list-group">
		<?php foreach($Items as $item) {?>
			<div class="list-group-item <?php If($item->done == 1){echo 'list-group-item-action list-group-item-danger';}?>" >
				<a href="del-rota?id=<?=$item->id?>" class="close">x</a>
				<a href="done-rota?id=<?=$item->id?>&done=<?=$item->done?>"class="text-reset"> <?=$item->nome?> </a>
			</div>

		<?php }?>
	</div>

	<form  action="Add-rota" method="GET">

		<label class="text-uppercase my-3 " >Novo Item </label>

		<div>
			<input class="form-control" name="nomeItem" type="text">
		</div>

		<button class="btn btn-primary mt-3 " >enviar</button>


	</form>


</div>
</body>
</html>
