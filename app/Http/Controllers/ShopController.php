<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Repositories\ComicRepository;
use App\ShoppingCart\Cart;
use App\ShoppingCart\CartItem;
use App\View\Components\Comics\ComicProductItem;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;

class ShopController extends Controller
{
    /** @var ComicRepository */
    protected $comicRepository;

    public function __construct(ComicRepository $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    /**
     * Add a product to the shopping cart
     *
     * @return RedirectResponse
     */
    public function add(Request $request): RedirectResponse
    {
        $id = $request->only('product_id');

        $comic = $this->comicRepository->getByPk($id['product_id']);

        if ($comic->stock >= 0) {
            $cartItem = new CartItem();

            $cartItem->setProduct($comic);


            if ($request->session()->get('cart'))
                $cart = $request->session()->get('cart');
            else {
                $cart = new Cart();
            }

            $cart->addItem($cartItem);

            $request->session()->put('cart', $cart);
        }

        return redirect()->back()
            ->with('message', 'Producto agregado con éxito.')
            ->with('message_type', 'is-success');
    }

    /**
     * Assigns a quantity to one of the products in the cart
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function setQuantity(Request $request): RedirectResponse
    {
        $data = $request->all();

        $cart = $request->session()->get('cart');

        $cart->setItemQuantity($data['id'], $data['quantity']);

        return back()
            ->with('message', 'Petición realizada con éxito')
            ->with('message_type', 'is-success');
    }

    /**
     * Remove an item from the cart
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function remove(Request $request): RedirectResponse
    {
        $data = $request->all();

        $cart = $request->session()->get('cart');

        $cart->removeItem($data['id']);

        return back()
            ->with('message', 'Producto quitado del carrito')
            ->with('message_type', 'is-success');
    }

    /**
     * Empty the cart by creating a new one and assigning it to Session
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function empty(Request $request): RedirectResponse
    {

        $request->session()->put('cart', new Cart());

        return back()
            ->with('message', 'Se vació el carrito')
            ->with('message_type', 'is-success');
    }

    /**
     * View of the shopping cart with the list of all the products in it and the button to make the purchase with Mercado Pago.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws Exception
     */
    public function cart(Request $request)
    {
        $items = [];

        $cart = $request->session()->get('cart') ?? new Cart();

        if (count($cart->getItems()) > 0) {
            foreach ($cart->getItems() as $cartItem) {
                $item = new Item();
                $item->title = $cartItem->getProduct()->title;
                $item->unit_price = $cartItem->getProduct()->getPrice();
                $item->quantity = $cartItem->getQuantity();
                $items[] = $item;
            }
        }
        $preference = new Preference;

        $preference->items = $items;

        $preference->back_urls = [
            'success' => route('shop.payment.confirmed'),
            'pending' => route('shop.payment.pending'),
            'failure' => route('shop.payment.failed'),
        ];

        $payer = new Payer();
        $payer->first_name = auth()->user()->name;
        $payer->last_name = auth()->user()->last_name;
        $payer->email = auth()->user()->email;

        $preference->payer = $payer;

        $preference->save();

        return view('shop.cart', compact('preference', 'cart'));

    }

    /**
     * View when payment was successful
     *
     * @param Request $request
     */
    public function paymentConfirmed(Request $request)
    {
        $request->session()->put('cart', new Cart());

        $status = 'success';

        return view('shop.payment-status', compact('status'));
    }

    /**
     * View when payment is still pending
     *
     * @param Request $request
     */
    public function paymentPending(Request $request)
    {
        $request->session()->put('cart', new Cart());

        $status = 'pending';

        return view('shop.payment-status', compact('status'));
    }

    /**
     * View when payment was rejected or failed
     *
     * @param Request $request
     */
    public function paymentFailed(Request $request)
    {
        $request->session()->put('cart', new Cart());

        $status = 'failed';

        return view('shop.payment-status', compact('status'));
    }
}
