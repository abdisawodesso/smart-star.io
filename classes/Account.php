<?php

class Account
{
    public $conn;
    public $table_name = "account";

    public $name;
    public $id;
    public $id2;
    public $amount;
    public $balance;
    public $type;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function create()
    {
        $sql = "INSERT INTO " . $this->table_name . " SET name = ?, id = ?, balance = ?, type = ?";

        $prep_state = $this->conn->prepare($sql);

        $prep_state->bindParam(1, $this->name);
        $prep_state->bindParam(2, $this->id);
        $prep_state->bindParam(3, $this->balance);
        $prep_state->bindParam(4, $this->type);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    function deposit()
    {
       $sql = "UPDATE " . $this->table_name . " SET balance = ((SELECT balance from " . $this->table_name. " where id = ?) + ?) where id = ?";

       $prep_state = $this->conn->prepare($sql);
        
        $prep_state->bindParam(1, $this->id);
        $prep_state->bindParam(2, $this->amount);
        $prep_state->bindParam(3, $this->id);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;

        }

    }

    function withdraw()
    {
       $sql = "UPDATE " . $this->table_name . " SET balance = ((SELECT balance from " . $this->table_name. " where id = ?) - ?) where id = ?";

       $prep_state = $this->conn->prepare($sql);
        
        $prep_state->bindParam(1, $this->id);
        $prep_state->bindParam(2, $this->amount);
        $prep_state->bindParam(3, $this->id);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;

        }

    }

    function balance()
    {
        $sql = "SELECT balance FROM " . $this->table_name . " WHERE id = ?";

        $prep_state = $this->conn->prepare($sql);

        $prep_state->bindParam(1, $this->id);
    
            $prep_state->execute();
    
    
            return $prep_state;
            $conn = NULL;

    }

    function transfer1()
    {

        $sql = "UPDATE " . $this->table_name . " SET balance = ((SELECT balance from " . $this->table_name ." where id = ?) - ?) where id = ? ";

        $prep_state = $this->conn->prepare($sql);

        $prep_state->bindParam(1, $this->id);
        $prep_state->bindParam(2, $this->amount);
        $prep_state->bindParam(3, $this->id);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function transfer2()
    {

        $sql = "UPDATE " . $this->table_name . " SET balance = ((SELECT balance from " . $this->table_name ." where id2 = ?) + ?) where id2 = ? ";

        $prep_state = $this->conn->prepare($sql);

        $prep_state->bindParam(1, $this->id2);
        $prep_state->bindParam(2, $this->amount);
        $prep_state->bindParam(3, $this->id2);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function Account($id,$name,$balance,$type){
        $this->name=$name;
        $this->id=$id;
        $this->balance=$balance;
        $this->type=$type;
    }
    function setName($name) {
        $this->name=$name;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setBalance($balance) {
        $this->balance = $balance;
    }
    function setType($type) {
        $this->type = $type;
    }
    function getName() {
        return $this->name;
    }
    function setId2($id2) {
        return $this->$id2;
    }
    function getId2() {
        return $this->id;
    }
    function getId() {
        return $this->id;
    }
    function getBalance() {
        return $this->balance;
    }
    function getType() {
        return $this->type;
    }
    function deposit7($amount, $balance){
        $balance+=$amount;
    }
    function withdraw2($amount){
        if($this->balance>=$amount){
            $this->balance-=$amount;
            echo 'your account...'.$this->id.'debited with';
            echo $amount;
            echo '<br>Your current balance is '.$this->balance;
        }
        else{
            echo 'insufficient balance to withdraw!';
        }
    }
    function transfer7(Account $ac,$amount){
        if($this->balance>$amount){
            echo  'Account# of '.$ac->id." current balance before transfer is: ".$ac->balance;
            $ac->balance+=$amount;
            $this->balance-=$amount;
            echo 'your account...'.$this->id.' debited with ETB';
            echo $amount." and transferred to Account#:".$ac->id." successfully!";
            echo '<br>Your current balance is '.$this->balance;
            echo '<br><br>===============================';
            echo  'Account# of '.$ac->id." updated balance is: ".$ac->balance;
        }
        else{
            echo 'insufficient balance to transfer!';
        }
    }
}
