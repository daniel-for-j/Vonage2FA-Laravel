<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

Route::get('{token_id}/get-nft-cards', 'NftController\nftCardController@getNftCards');
Route::post('{token_id}/post-wallet-address', 'NftController\nftCardController@postWalletAddress');

Route::post('post-nft', 'NftController\nftCardController@postNftCard');