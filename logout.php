<?php

session_start();
unset($_SESSION['rid']);


?>
<script>
  alert("You are loged out");
  window.open('login.php', '_self');
</script>