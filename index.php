<?php require_once('header.php'); ?>

<body>

<header>
	<h1>なぜ地獄
		<small>ほげほげ</small>
	</h1>
</header>
<h2>あなたのお悩みなんてーの</h2>
	<input id="inputbox" type="text">
	<button id="submit_first" type="button">なぜ地獄の悩みから開放されたい</button>


</body>

<script type="text/javascript">
	$('#submit_first').click(function(){
		console.log($('#inputbox').val());

	});
</script>

</html>