<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use ipinfo\ipinfolaravel\Facades\ipinfolaravel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', function (Request $request) {
    // $userIp = $request->ip();
    $client = new \GuzzleHttp\Client();
    // // $response = $client->get("https://ipinfo.io/{$userIp}?token=18ae09f550de5c");
    // // $data = json_decode($response->getBody());
    // $location_text = "The IP address {$request->ipinfo->ip}.";
    // // Extract user information
    // dd($request->ipinfo);
    $city = $request->ipinfo->city ?? 'dhaka';
    $response = $client->request('GET', "https://muslimsalat.p.rapidapi.com/{$city}.json", [
        'headers' => [
            'X-RapidAPI-Host' => 'muslimsalat.p.rapidapi.com',
            'X-RapidAPI-Key' => 'd8d03a60camshdded7f107164c76p12316ejsn1085ec72d07c',
        ],
    ]);

    // json_decode($response->getBody());
    return Inertia::render('Home', ['infos' => json_decode($response->getBody())]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
