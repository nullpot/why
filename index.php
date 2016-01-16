<?php require_once('header.php'); ?>

<body>

<<header>
	<h1><img src="img/logo.png" alt="ナゼジゴク"></h1>
</header>
<div class="wrap">
	<section>
		<img src="img/keyvisual.png" alt="ナゼジゴク">
		<span class="button">ジゴクにオチル?</span>
	</section>
</div>
<form method="POST" action="why.php">
	<input id="inputbox" type="text">
	<button type="submit">submit</button>
	<button id="analysis" type="button">submit</button>
</form>


</body>

<script type="text/javascript">
//	$('#submit_first').click(function(){
//		console.log($('#inputbox').val());
//
//	});

$('#analysis').click(function(){
	console.log($('#inputbox').val());

	jQuery.ajax({
		url: 'http://www.ykamei.net/',
		dataType: 'json',
		timeout: 10000, //10sec
		data: {
			message:$('#inputbox').val()
		}
	}).done(function (res) {
		console.log('done'+res);
		$('#dokozo').text(res.text);
	}).fail(function () {
		console.log('false'+res);
		$('#dokozo').text('で？');
	});
});

</script>

</html>
