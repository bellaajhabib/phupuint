<?php

/**
 * Order
 *
 * An example order class
 */
class Order
{

    /**
     * Amount
     * @var int
     */
    public $amount = 0;

    /**
     * Payment gateway dependency
     * @var PaymentGateway
     */
    protected $gateway;

    protected int $count =0;
    /**
     * @var string
     */
    public string $ip;
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * Process the order
     *
     * @return boolean
     */
    public function process()
    {
        return $this->gateway->charge($this->amount);
    }


        public function checkProcess()
    {
        return $this->gateway->check($this->ip);
    }

     public function countProcess()
    {
         $this->count++;
    }
         public function getCountProcess(): int
         {
        return $this->count;
    }
}
