<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class StripeController extends Controller
{
    /**
     * @return View|Factory|Application
     */
    public function checkout(): View|Factory|Application
    {
        return view('checkout');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function test(Request $request): RedirectResponse
    {
        $facture = json_decode($request->input('facture'), true); // Decode JSON string to array
        $services = json_decode($request->input('services'), true); // Decode JSON string to array

        Stripe::setApiKey(config('stripe.test.sk'));

        $line_items = [];
        foreach ($services as $service) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => $service['libelle'],
                    ],
                    'unit_amount' => $service['taux_tva'] * 100, // Convert to smallest currency unit
                ],
                'quantity' => 1, // Adjust quantity if needed
            ];
        }

        $session = Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function live(Request $request): RedirectResponse
    {
        $facture = json_decode($request->input('facture'), true); // Decode JSON string to array
        $services = json_decode($request->input('services'), true); // Decode JSON string to array

        Stripe::setApiKey(config('stripe.live.sk'));

        $line_items = [];
        foreach ($services as $service) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $service['libelle'],
                    ],
                    'unit_amount' => $service['montant'] * 100, // Convert to smallest currency unit
                ],
                'quantity' => 1, // Adjust quantity if needed
            ];
        }

        $session = Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    /**
     * @return View|Factory|Application
     */
    public function success(): View|Factory|Application
    {
        return view('success');
    }
}
