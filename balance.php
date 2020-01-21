<?php

$page_title = "Check Balance";
$page_footer = "© Copyright 2020. All Rights Reserved.";
include_once "header.php";
include_once 'classes/db.php';

$database = new db();
$db = $database->getConnection();

if ($_POST){

    include_once 'classes/Account.php';
    $account = new Account($db);

    $account->id = htmlentities(trim($_POST['id']));

    $prep_state = $account->balance();
    $num = $prep_state->rowCount();

    if($num>0){
        while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Dear Customer Your <br> Balance is $row[balance] Birr <br><br>";

            echo "Thank You For Choosing Us.";
            echo "</div>";
        }
}
else{
    echo "<div class=\"alert alert-danger alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
        echo "Error! Unable to check balance Please Enter Correct Account Number.";
        echo "</div>";
    }}
?>

<form action='balance.php' role="form" method='post'>
    <input type='text' name='id' class='form-control' placeholder="Account Number" required></br>
        <button type="submit" class="btn btn-warning form-control">
            <span class="glyphicon glyphicon-plus "></span> Check Balance
        </button>
</form>

<?php
                 echo "<div class='btn btn-block'>";
                 echo "<h1>{$page_footer}</h1>";
                 echo "</div>  </br> </br>";
                
            ?>
</div>

</body>
</html>