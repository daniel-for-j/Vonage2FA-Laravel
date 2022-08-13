<?php

namespace App\Http\Controllers\NftController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NftCardModels\NftCard;

class nftCardController extends Controller
{
    public function getNftCards($tokenId) {
        return NftCard::where('token_id',$tokenId)->get();
    }

    function postNftCard(Request $request){
        $nftCard = new NftCard;
        $nftCard->token_id = $request->token_id;
        $nftCard->owned_by = $request->owned_by;
        $nftCard->total_xp = $request->total_xp;
        $nftCard->level = $request->level;
        $nftCard->health = $request->health;
        $nftCard->attack = $request->attack;
        $nftCard->defense = $request->defense;
        $nftCard->stamina = $request->stamina;
        $nftCard->fight_wins = $request->fight_wins;
        $nftCard->fight_total = $request->fight_total;
        $save = $nftCard->save();
        if($save){
            return [
                "Message"=>"Nft Saved Succesfully"
            ];
        }
        return [
            "Message"=>"Something went wrong"
        ];
    }
    
   public function postWalletAddress(Request $request, $tokenId){
         $nftCard = NftCard::where('token_id',$tokenId)->first();
         if($nftCard){
            $nftCard->owned_by = $request->wallet_address;
            $result = $nftCard->save();
            if($result)
            {
               return [
                "Message"=>"Updated Wallet Address Successfully",
                "Nft Card"=> $nftCard
                
               ];
            }
         }
         else{
            return [
                "Message"=>"Token was not found"
            ];
         }


    } 


}
