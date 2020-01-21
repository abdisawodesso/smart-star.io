<?php

$page_title = "Deposit Money";
$page_footer = "© Copyright 2020. All Rights Reserved.";
include_once "header.php";
include_once 'classes/db.php';

$database = new db();
$db = $database->getConnection();

if ($_POST){

    include_once 'classes/Account.php';
    $account = new Account($db);

    $account->id = htmlentities(trim($_POST['id']));
    $account->amount = htmlentities(trim($_POST['amount']));

    if($account->deposit()){
    
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
        $amount = htmlentities(trim($_POST['amount']));

        echo "Dear Customer <br> Your Account Has Been Credited <br> With ". $amount. " Birr. "; 
        $prep_state = $account->balance();
        $num = $prep_state->rowCount();
        if($num>0){
            while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                echo "Your <br> Current Balance is $row[balance] Birr <br><br>";
            }
        }
        echo "<br><br> Thank You For Choosing Us. <br>";
        echo "</div>";
    }

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
        echo "Error! Unable to Deposit money.";
        echo "</div>";
    }
}
?>

<form action='deposit.php' role="form" method='post'>
    <input type='text' name='id' class='form-control' placeholder="To Account." required></br>
    <input type='money' name='amount' class='form-control' placeholder="Amount." required></br>
        <button type="submit" class="btn btn-warning form-control">
            <span class="glyphicon glyphicon-plus "></span> Deposit Money.
        </button>
</form>
<?php
                 // show page header
                 echo "<div class='btn btn-block'>";
                 echo "<h1>{$page_footer}</h1>";
                 echo "</div>  </br> </br>";
                
            ?>
</div>
</body>
</html>

