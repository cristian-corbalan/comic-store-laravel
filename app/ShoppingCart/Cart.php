<?php


namespace App\ShoppingCart;


class Cart
{
    /** @var array|CartItem[] */
    public $items = [];

    /**
     * Add an item to the cart
     *
     * @param CartItem $newItem
     */
    public function addItem(CartItem $newItem): void
    {

        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $newItem->getProduct()->id) {
                $item->setQuantity($item->getQuantity() + 1);
                return;
            }
        }

        $this->items[] = $newItem;
    }

    /**
     * Returns all items in the cart
     *
     * @return array|CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Remove an item from the cart
     *
     * @param $id
     */
    public function removeItem($id)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProduct()->id == $id) {
                unset($this->items[$key]);

                $this->items = array_values($this->items);
            }
        }
    }

    /**
     * Returns the sum of item subtotals
     *
     * @return float|int
     */
    public function getTotalAmount()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    /**
     * Returns the sum of item quantity
     *
     * @return int
     */
    public function getTotalItems(): int
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getQuantity();
        }

        return $total;
    }

    /**
     * Empty the cart
     *
     * @return array
     */
    public function emptyCart(): array
    {
        return $this->items[] = [];
    }

    public function setItemQuantity($id, $quantity)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProduct()->id == $id) {
                $this->items[$key]->setQuantity($quantity);
            }
        }
    }
}
