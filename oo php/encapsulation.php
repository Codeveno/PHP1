<?php
class bankaccount
{
    private $balance = 30;

    public function deposit($amount)
    {
        if ($amount < 40)
        {
            $this -> balance += $amount;

        }
        return  $this -> balance;

    }

    public function getbalance()
    {
        return $this -> balance;    

}
}

$account = new bankaccount();
$account -> deposit(100);
echo $account -> getbalance();

