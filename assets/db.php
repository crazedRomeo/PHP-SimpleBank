<?php 
    $con = new mysqli('localhost','root','','db_sbank');
    $ar = $con->query("select * from user where id = '".$_SESSION['user_id']."' AND active = 1");
    $userData = $ar->fetch_assoc();
?>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>