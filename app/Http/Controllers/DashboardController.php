<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Facture;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $allClients = Client::count();
            $numberOfContracts = Contract::count();
            $totalAmount = Facture::sum('montant_total');
            $recentClients = Client::latest()->take(5)->get();

            return view('Back.dashboard', compact('allClients', 'numberOfContracts', 'totalAmount', 'recentClients'));
        } catch (\Exception $e) {
            // Handle any exceptions here, e.g., log the error, return an error view, etc.
            return response()->view('errors.500', [], 500); // Example: return a 500 error view
        }
    }

}
