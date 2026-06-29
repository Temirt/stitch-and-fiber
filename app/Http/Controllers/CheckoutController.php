<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display checkout form.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/shop')->with('error', 'Your shopping bag is empty.');
        }
        
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $shipping = 15.00;
        $tax = $subtotal * 0.08;
        $total = $subtotal + $shipping + $tax;

        return view('checkout', compact('cart', 'subtotal', 'shipping', 'tax', 'total'));
    }

    /**
     * Process checkout submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|string|max:24',
            'card_expiry' => 'required|string|max:7',
            'card_cvc' => 'required|string|max:4',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/shop')->with('error', 'Your shopping bag is empty.');
        }

        // Store order details in session to show on success screen
        $orderId = 'SF-' . strtoupper(bin2hex(random_bytes(4)));
        $orderData = [
            'order_id' => $orderId,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'items' => $cart,
        ];
        session()->put('last_order', $orderData);

        // Clear cart
        session()->forget('cart');

        return redirect('/checkout/success');
    }

    /**
     * Display order success confirmation.
     */
    public function success()
    {
        $order = session()->get('last_order');
        if (!$order) {
            return redirect('/shop');
        }
        return view('checkout-success', compact('order'));
    }
}
