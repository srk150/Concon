<?php
   	  // Remove cookie variables

	  if(isset($_COOKIE['user'])):

	  setcookie('id', '', time()-(86400 * 7), '/');

	  setcookie('username', '', time()-(86400 * 7), '/');

	  setcookie('user', '', time()-(86400 * 7), '/');

	  setcookie('fname', '', time()-(86400 * 7), '/');

	  endif;



       header("Location: ../../sign-in.php");



?>
