<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('donations', DonationController::class)
//     ->only(['index', 'store'])
//     ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    // Campaign routes
    Route::get('campaigns', [CampaignController::class, 'index'])->name('campaigns.index'); // List all campaigns
    Route::get('campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
    // Route::post('campaigns', [CampaignController::class, 'create'])->name('campaigns.create'); // Create a new campaign
    Route::post('campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('campaigns/{campaign}', [CampaignController::class, 'show'])->name('campaigns.show');
    
    // Donation routes
    // Route to show the donation form for a specific campaign
    Route::get('campaigns/{campaign}/donate', [DonationController::class, 'showDonateForm'])->name('campaigns.donate');
    // Store the donation
    Route::post('campaigns/{campaign}/donate', [DonationController::class, 'store'])->name('campaigns.donate.store');
    // Route::post('campaigns/{campaign}/donate', [DonationController::class, 'donate'])->name('campaigns.donate'); // Donate to a specific campaign
    Route::get('donations', [DonationController::class, 'index'])->name('donations.index'); // List all donations
});

require __DIR__.'/auth.php';
