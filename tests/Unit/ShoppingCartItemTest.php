<?php

namespace Tests\Unit;

use App\Models\Comic;
use App\ShoppingCart\CartItem;
use PHPUnit\Framework\TestCase;

class ShoppingCartItemTest extends TestCase
{
    /** @var CartItem */
    protected $cartItem;

    protected function setUp(): void
    {
        $this->cartItem = new CartItem();
    }

    public function test_can_create_instance_for_cartitem()
    {
        $this->assertInstanceOf(CartItem::class, $this->cartItem);
    }

    public function test_can_set_a_comic_to_a_cartitem()
    {
        $comic = $this->getComic();

        $this->cartItem->setProduct($comic);

        $this->assertEquals($comic, $this->cartItem->getProduct());
    }

    public function test_set_a_comic_to_a_cartitem_without_quantity_defaults_quantity_to_one()
    {
        $comic = $this->getComic();

        $this->cartItem->setProduct($comic);

        $this->assertEquals(1, $this->cartItem->getQuantity());
    }

    public function test_set_quantity_of_5_set_it_correctly()
    {
        $expected = 5;

        $this->cartItem->setQuantity($expected);

        $this->assertEquals($expected, $this->cartItem->getQuantity());
    }

    public function test_get_subtotal_returns_the_price_times_quantity()
    {
        $comic = $this->getComic();

        $quantity = 5;

        $this->cartItem->setProduct($comic);
        $this->cartItem->setQuantity($quantity);

        $subtotal = $this->cartItem->getSubtotal();

        $this->assertEquals(2500, $subtotal);
    }

    public function test_get_subtotal_returns_the_price_for_the_quantity_including_discount()
    {
        $comic = $this->getComic(50);

        $quantity = 1;

        $this->cartItem->setProduct($comic);
        $this->cartItem->setQuantity($quantity);

        $subtotal = $this->cartItem->getSubtotal();

        $this->assertEquals(250, $subtotal);
    }

    public function getComic($discount = 0): Comic
    {
        $comic = new Comic();
        $comic->id = 1;
        $comic->price = 50000;
        $comic->discount = $discount;

        return $comic;
    }
}
