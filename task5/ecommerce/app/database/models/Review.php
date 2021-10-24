<?php

require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";

class Review extends connection implements crud
{
    private $user_id;
    private $product_id;
    private $like;
    private $comment;




    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

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
     * Get the value of like
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * Set the value of like
     *
     * @return  self
     */
    public function setLike($like)
    {
        $this->like = $like;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    public function create()
    {
        # code...
    }
    public function read()
    {
    }
    public function delete()
    {
        # code...
    }
    public function update()
    {
        # code...
    }
    public function mostReview()
    {
        $query = "SELECT
        *
    FROM `products`
    JOIN `reviews`
    ON `products`.`id` = `reviews`.`product_id`
    GROUP BY `product_id`
    
     ORDER BY `product_id` DESC
     LIMIT 4";
        return $this->runDQL($query);
    }
}
