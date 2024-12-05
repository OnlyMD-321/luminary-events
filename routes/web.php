<?php

use App\Models\Client;
use App\Models\Facture;
use App\Models\Service;
use App\Models\Contract;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailConroller;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/Contact', [MailConroller::class, 'contact'])->name('Contact.mail');

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/client', [ClientController::class, 'index'])->name('client');
    Route::get('/contract', [ContractController::class, 'index'])->name('contract');
    Route::get('/facture', [FactureController::class, 'index'])->name('facture');
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/paiement', [PaiementController::class, 'index'])->name('paiement');

    Route::get('/addclient', function (){
        return view ('Back/Add/addclient');
    });
    Route::post('/client', [ClientController::class, 'create'])->name('client.create');
    Route::get('/client/{client}/edit',[ClientController::class, 'edit'])->name('client.edit');
    Route::put('/client/{client}/update',[ClientController::class, 'update'])->name('client.update');
    Route::get('/client/{client}/show',[ClientController::class, 'show'])->name('client.show');
    Route::delete('/client/{client}',[ClientController::class, 'destroy'])->name('client.delete');
   Route::get('/addcontrat', function () {
    $clients = Client::all(['id', 'designation']);
    $services = Service::pluck('libelle');
    return view('Back/Add/addcontrat', compact('clients', 'services'));
});
    Route::post('/contract', [ContractController::class, 'create'])->name('contract.create');

    Route::get('/contract/{contract}/edit',[ContractController::class, 'edit'])->name('contract.edit');
    Route::put('/contract/{contract}/update',[ContractController::class, 'update'])->name('contract.update');
    Route::get('/contract/{contract}/show',[ContractController::class, 'show'])->name('contract.show');
    Route::delete('/contract/{contract}', [ContractController::class, 'destroy'])->name('contract.delete');

    Route::get('/addfacture', function (){
        $serviceIds = Service::pluck('id');
        return view('Back/Add/addfacture', compact('serviceIds'));
    });
    //Route::post('/facture', [FactureController::class, 'create'])->name('facture.create');
    //Route::get('/facture/{facture}/edit',[FactureController::class, 'edit'])->name('facture.edit');
    //Route::put('/facture/{facture}/update',[FactureController::class, 'update'])->name('facture.update');
    Route::get('/facture/{facture}/show',[FactureController::class, 'show'])->name('facture.show');
    Route::get('/facture/show/{id}', [FactureController::class, 'show'])->name('facture.show');
    Route::get('/facture/pdfdownload/{id}', [FactureController::class, 'pdfDownload'])->name('pdfdownload');

    Route::delete('/facture/{facture}', [FactureController::class, 'destroy'])->name('facture.delete');

    Route::get('/addservice', function (){
        return view ('Back/Add/addservice');
    });
    Route::post('/service', [ServiceController::class, 'create'])->name('service.create');
    Route::get('/service/{service}/edit',[ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{service}/update',[ServiceController::class, 'update'])->name('service.update');
    Route::get('/service/{service}/show',[ServiceController::class, 'show'])->name('service.show');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.delete');
    Route::get('/addpaiement', function () {
        $factures = Facture::all();
        $factureData = $factures->map(function ($facture) {
            return [
                'id' => $facture->id,
                'numero_facture' => $facture->numero_facture,
                'montant_total' => $facture->montant_total,
            ];
        });

        return view('back.add.addpaiement', compact('factures', 'factureData'));
    });

    Route::post('/paiement', [PaiementController::class, 'create'])->name('paiement.create');
    Route::get('/paiement/{paiement}/edit',[PaiementController::class, 'edit'])->name('paiement.edit');
    Route::put('/paiement/{paiement}/update',[PaiementController::class, 'update'])->name('paiement.update');
    Route::get('/paiement/{paiement}/show',[PaiementController::class, 'show'])->name('paiement.show');
    Route::delete('/paiement/{paiement}', [PaiementController::class, 'destroy'])->name('paiement.delete');
    Route::get('/facture/generate/{id}', [FactureController::class, 'generate']);

    Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
    Route::post('/pay/test', [StripeController::class, 'test'])->name('stripe.test');
    Route::post('/pay/live', [StripeController::class, 'live'])->name('stripe.live');
    Route::get('/success', [StripeController::class, 'success'])->name('success');

});

require __DIR__.'/auth.php';
