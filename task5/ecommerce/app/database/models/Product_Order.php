<?php

require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";

class Product_Order extends connection implements crud
{
    private $product_id;
    private $order_id;
    private $price;

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of order_id
     */ 
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */ 
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function create()
    {
        # code...
    }
    public function read()
    {
        # code...
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }
    public function mostOrdered()
    {
        $query="SELECT
        *
    FROM `products`
    JOIN `products_orders`
    ON `products`.`id` = `products_orders`.`product_id`
    GROUP BY `product_id`
    
     ORDER BY `product_id` DESC
     LIMIT 4";

     return $this->runDQL($query);
    }
}
