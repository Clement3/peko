<?php

if(!function_exists('totalPrice')){
    function totalPrice($products){
        $TTC = 0;
        foreach($products as $product){
            $qty = $product->quantity;
            $price = $product->product->price;
            $TTC += ($qty*$price);
        }
        return $TTC;
    }   
}

if(!function_exists('facturePrice')){
    function facturePrice($product){
        $qty = $product->quantity;
        $price = $product->product->price;
        return number_format(($qty*$price), 2);
    }
}

if(!function_exists('addTva')){
    function addTva($price){
        $tva = 19.6;
        $calc = ($tva/100)*$price;
        $result = $price+$calc;
        return $result;
    }
}