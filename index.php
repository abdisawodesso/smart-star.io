<?php

$page_title = "Welcome to Smart Bank";
$page_footer = "© Copyright 2020. All Rights Reserved.";
include_once "header.php";
?>
<div class="container-fluid">
<br>
    <div>
        <a href="create.php" class="btn btn-default btn-group-justified btn-warning">Create Account</a></br>
        <a href="transfer.php" class="btn btn-default btn-group-justified btn-warning">Transfer Money</a></br>
        <a href="withdraw.php" class="btn btn-default btn-group-justified btn-warning">Withdraw Money</a></br>
        <a href="deposit.php" class="btn btn-default btn-group-justified btn-warning">Deposit Money</a></br>
        <a href="balance.php" class="btn btn-default btn-group-justified btn-warning">Check Balance</a></br>
    </div>
</div>

<?php
                 // show page header
                 echo "<div class='btn btn-block'>";
                 echo "<h1>{$page_footer}</h1>";
                 echo "</div>  </br> </br>";
                
            ?>
</div>
</body>
</html>

