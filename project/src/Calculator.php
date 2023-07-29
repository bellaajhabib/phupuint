<?php

class Calculator
{
    public MathService $mathService;

        public function __construct(MathService $mathService)
        {
            $this->mathService = $mathService;
        }

        public function add($a, $b)
        {
            return $this->mathService->add($a, $b);
        }
           public function sub($a, $b)
        {
            return $this->mathService->sub($a, $b);
        }
}