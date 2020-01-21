<?php

$page_title = "Create Account";
$page_footer = "© Copyright 2020. All Rights Reserved.";
include_once "header.php";
include_once 'classes/db.php';

$database = new db();
$db = $database->getConnection();

if ($_POST){

    include_once 'classes/Account.php';
    $account = new Account($db);

    $account->name = htmlentities(trim($_POST['name']));
    $account->id = htmlentities(trim($_POST['id']));
    $account->balance = htmlentities(trim($_POST['balance']));
    $account->type = htmlentities(trim($_POST['type']));

    if($account->create()){
        
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
        $balance = htmlentities(trim($_POST['balance']));          

        echo "Dear Customer Welcome To Smart Bank SC. <br> Your Account Has Been Credited <br> With Initiall Balance Of ". $balance. " Birr. <br>";
        $prep_state = $account->balance();
        $num = $prep_state->rowCount();
        if($num>0){
            while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                echo "Your Current Balance is $row[balance] Birr. <br><br>";
            }
        }
        echo "Thank You For Choosing Us. <br>";
        echo "</div>";

    }

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
        echo "Error! Unable to create account.";
        echo "</div>";
    }
}
?>

<form action='create.php' role="form" method='post'>
    <input type='text' name='name'  class='form-control ' placeholder="Enter Name" required></br>
    <input type='text' name='id' class='form-control' placeholder="Account Number" required></br>
    <input type='money' name='balance' class='form-control' placeholder="Initial Balance" required></br>
    <input type='text' name='type' class='form-control' placeholder="Account Type" required></br>
        <button type="submit" class="btn btn-warning form-control">
            <span class="glyphicon glyphicon-plus "></span> Create Account
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