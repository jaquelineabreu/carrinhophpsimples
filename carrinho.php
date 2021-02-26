
	<h2 class="title">Carrinho</h2>
	<?php

	foreach ($_SESSION['carrinho'] as $key => $value) {
	
	echo '<div class="carrinho-item">';
	echo '<p>Nome: '.$value['nome'].' | quantidade: '.$value['quantidade'].' | Preço: '.($value['quantidade'])*($value['preco']).'</p>';
	
	echo '</div>';
	}

	?>