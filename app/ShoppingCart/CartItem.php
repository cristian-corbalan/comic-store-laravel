<?php


namespace App\ShoppingCart;


use App\Models\Comic;

class CartItem
{
    /** @var Comic */
    protected $product;
    /** @var int */
    protected $quantity;

    public function setProduct($product)
    {
        $this->product = $product;
        $this->quantity = $this->quantity ?? 1;
    }

    public function getProduct(): Comic
    {
        return $this->product;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getSubtotal()
    {
        return $this->product->getPrice() * $this->quantity;
    }
}
