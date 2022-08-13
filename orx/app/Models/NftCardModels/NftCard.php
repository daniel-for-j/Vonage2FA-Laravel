<?php

namespace App\Models\NftCardModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftCard extends Model
{
// Name of table being used
    protected $table = "nft_card";
    use HasFactory;
}
