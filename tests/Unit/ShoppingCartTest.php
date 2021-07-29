<?php

namespace Tests\Unit;

use App\Models\Comic;
use App\ShoppingCart\CartItem;
use PHPUnit\Framework\TestCase;
use App\ShoppingCart\Cart;

class ShoppingCartTest extends TestCase
{
    /** @var Cart */
    protected $cart;

    protected function setUp(): void
    {
        $this->cart = new Cart();
    }

    public function test_add_item_adds_that_item_to_the_cart()
    {
        $ci = $this->createItem(1, 500);

        $this->cart->addItem($ci);

        $this->assertCount(1, $this->cart->getItems());
        $this->assertEquals($ci, $this->cart->getItems()[0]);
    }

    public function test_add_item_adds_two_of_the_same_item_it_sets_its_quantity_to_two()
    {
        $ci = $this->createItem(1, 500);
        $ci2 = $this->createItem(1, 500);

        $this->cart->addItem($ci);
        $this->cart->addItem($ci2);

        $this->assertCount(1, $this->cart->getItems());
        $this->assertEquals(1, $this->cart->getItems()[0]->getProduct()->id);
        $this->assertEquals(2, $this->cart->getItems()[0]->getQuantity());

    }

    public function test_add_item_adds_two_different_items_as_two_different_items()
    {
        $ci = $this->createItem(1, 500);
        $ci2 = $this->createItem(2, 1000);

        $this->cart->addItem($ci);
        $this->cart->addItem($ci2);

        $this->assertCount(2, $this->cart->getItems());
        $this->assertEquals($ci, $this->cart->getItems()[0]);
        $this->assertEquals($ci2, $this->cart->getItems()[1]);
    }

    public function test_remove_item_removes_the_requested_item()
    {
        $ci = $this->createItem(1, 500);

        $this->cart->addItem($ci);

        $this->cart->removeItem(1);

        $this->assertCount(0, $this->cart->getItems());
    }

    public function test_remove_item_doesnt_remove_a_not_included_item()
    {
        $ci = $this->createItem(1, 500);

        $this->cart->addItem($ci);

        $this->cart->removeItem(4);

        $this->assertCount(1, $this->cart->getItems());
    }

    public function test_get_total_amount_returns_the_subtotal_sum_of_all_items()
    {
        $ci = $this->createItem(1, 500);
        $ci2 = $this->createItem(2, 1000);
        $ci3 = $this->createItem(2, 1000);

        $this->cart->addItem($ci);
        $this->cart->addItem($ci2);
        $this->cart->addItem($ci3);

        $total = $this->cart->getTotalAmount();

        $this->assertEquals(2500, $total);
    }

    public function test_test_empty_cart_empty_the_cart()
    {
        $ci1 = $this->createItem(1, 500);
        $ci2 = $this->createItem(2, 500);

        $this->cart->addItem($ci1);
        $this->cart->addItem($ci2);

        $this->assertCount(0, $this->cart->emptyCart());
        $this->assertEquals([], $this->cart->emptyCart());
    }

    public function test_set_quantity_sets_the_specified_quantity(){
        $ci = $this->createItem(1, 500);

        $this->cart->addItem($ci);

        $this->cart->setItemQuantity(1, 4);

        $this->assertEquals(4, $this->cart->getItems()[0]->getQuantity());
    }

    public function createItem($id, $price): CartItem
    {
        $ci = new CartItem();
        $comic = new Comic();
        $comic->id = $id;
        $comic->price = $price;
        $ci->setProduct($comic);
        return $ci;
    }
}
