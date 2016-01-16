<?php require_once('header.php'); ?>
<?php
// 解析
// require_once('');
?>

<body>

<header>
	<h1>なぜ地獄
		<small>ほげほげ</small>
	</h1>
</header>

<h2>あなたのお悩みなんてーの</h2>
<?php if($count>1):?>
<form method="POST" action="result.php">
	<button type="submit">submit</button>
</form>
<?php endif;?>


</body>


</html>