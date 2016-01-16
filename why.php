<?php
session_start();

if (!isset($_SESSION['count'])) {
	$_SESSION['count'] = 0;
}else{
	$_SESSION['count']++;
}

$_SESSION['result'][] = $_POST['inputbox'];

// 解析
$result = file_get_contents('http://www.ykamei.net/?message=' . $_POST['inputbox']);

require_once('header.php'); ?>

<body>

	<header>
		<h1><img src="img/logo.png" alt="ナゼジゴク"></h1>
	</header>

	<div class="wrap">
    <section>
      <div id="contents">
				<h2>どうして<?php echo $result?>なの？</h2>

				<form method="POST" action="why.php">
					<input id="inputbox" class="button button--why--top" name="inputbox" type="text" placeholder="入力してください">
					<button type="submit" class="button button--why">まだツヅケル?</button>
					<button type="button" id="buddha" class="button button--why">テンゴクにイク</button>
				</form>
			</div>

			<ul id="lusts" style="display: none;">
				<li>test</li>
				<li>test</li>
				<li>test</li>
				<?php
				foreach ($_SESSION['result'] as $result): ?>
					<li><?php echo $result ?> </li>
				<?php endforeach; ?>
			<ul>
    </section>
  </div>



</body>


</html>
