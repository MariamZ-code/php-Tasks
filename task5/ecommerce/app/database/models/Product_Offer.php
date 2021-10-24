<?php

require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";

class Product_Offer extends connection implements crud
{
    private $product_id;
    private $offer_id;
   

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
     * Get the value of offer_id
     */ 
    public function getOffer_id()
    {
        return $this->offer_id;
    }

    /**
     * Set the value of offer_id
     *
     * @return  self
     */ 
    public function setOffer_id($offer_id)
    {
        $this->offer_id = $offer_id;

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

    public function offers()
    {
        $query= "SELECT
        `products`.`name_en`,
        `products`.`image`,
        `offers`.`title_en`,
        `offers`.`desc_en`,
        `offers`.`start_date`,
        `offers`.`end_date`
    FROM
        `products`
    JOIN `product_offer` ON `products`.`id` = `product_offer`.`product_id`
    JOIN `offers` ON `offers`.`id` = `product_offer`.`offer_id`
    GROUP BY
        `product_id`";
        return $this->runDQL($query);
    }
}