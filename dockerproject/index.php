<?php
namespace app;

require 'customer.php';

class invoice
{
    public function __construct(public customer $customer)
    {
        
    }
    public function process(float $amount): void
    {
        if($amount <= 0)
        {
            throw new \InvalidArgumentException('invalid invoice amount');

        }
        if ($amount > 60)
        {
            echo 'processing $' . $amount . ' invoice -';
            sleep(1);
            echo 'Ok' . PHP_EOL;
        }
        else
        {
            echo 'processing $' . $amount . ' invoice -';
            sleep(1);
            echo 'Ok' . PHP_EOL;
        }
       
        echo  'processing $' . $amount . 'invoice -';
sleep(1);
 echo 'Ok' . PHP_EOL;
  
 }
}
?>
