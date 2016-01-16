<?php
if (!isset($_SESSION)) {
	session_start();
}
$_SESSION = array();
session_destroy();
$_SESSION['count'] = 0;
$_SESSION['result']=array();


require_once('header.php');
?>

<body>

	<header>
    <h1><img src="img/logo.png" alt="ナゼジゴク"></h1>
  </header>

	<div class="wrap">
    <section>
      <img src="img/keyvisual.png" alt="ナゼジゴク">
      <form method="POST" action="why.php">
      	<input id="inputbox" class="button" name="inputbox" type="text" placeholder="入力してください">
      	<button type="submit" class="button">ジゴクにオチル?</button>
      </form>
    </section>
  </div>

</body>


</html>
