<?php

if(!function_exists('totalPrice')){
    function totalPrice($products){
        $TTC = 0;
        foreach($products as $product){
            $TTC += $product->product->price;
        }
        return $TTC;
    }   
}