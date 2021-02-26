<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrinhod  compras PHP</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		h2.title{
			background-color:#069;
			width: 100%;
			padding: 20px;
			text-align: center;
			color:white;
		}

		.carrinho-container{
			display: flex;
			margin-top: 10px;

		}
		.produto{
			width: 33.3%;
			padding:0 30px;
		}

		.produto img{
			max-width: 100%;			
		}

		.produto a{
			display: block;
			width: 100%;
			padding: 10px;
			color:white;
			background-color: #5fb382;
			text-align: center;
			text-decoration: none;
		}

		.carrinho-item{
			max-width: 1200px;
			margin: 10px auto;
			padding-bottom: 10px;
			border-bottom: 2px dotted #ccc;
		}

		.carrinho-item p{
			font-size: 19px;
			color: gray;
		}
	</style>
</head>
<body>
	<h2 class="title">Carrinho com PHP</h2>
	<div class="carrinho-container">
<?php

	$items =  $arrayName = array(['nome'=>'Gato1','imagem'=>'imagem1.jpg','preco' => '100'],
		['nome'=>'Gato2','imagem' => 'imagem2.jpg','preco'=>'100'],
		['nome'=>'Gato3','imagem' => 'imagem3.jpg','preco'=>'400']);


	foreach ($items as $key => $value) {
?>

	<div class="produto">
		<img src="<?php echo $value['imagem']?>"/>
		<a href="?adicionar=<?php echo $key ?>">Adicionar ao carrinho!</a>
		
	</div><!--Produto-->



<?php
	}
?>
</div>

	<?php
		if(isset($_GET['adicionar'])){
			//vamos adicionar ao carrinho
			$idProduto = (int) $_GET['adicionar'];
			if(isset($items[$idProduto])){
				if(isset($_SESSION['carrinho'][$idProduto])){
					$_SESSION['carrinho'][$idProduto]['quantidade']++;
				}else{
					$_SESSION['carrinho'][$idProduto] = array('quantidade'=>1,'nome'=>$items[$idProduto]['nome'],'preco'=>$items[$idProduto]['preco']);
				}
				echo '<script>alert("O item foi adicionado ao carrinho!");</script>';

			}
			else{
				die('Você não pode adicionar um item que não existe');
			}
		}


		include('carrinho.php');
	?>


</body>
</html>
