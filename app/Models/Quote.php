<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    public $table = 'quote';

    protected $fillable = [
            'companyName',
            'companyEmail',
            'companyAddress',
            'companyCity',
            'companyPhoneNumber',
            'province',
            'postalCode',
            'minLobsterSizes',
            'maxLobsterSizes' ,
            'totalLiveLobsterPounds',
            'totalFrozenLobsterPounds',
            'clamMeatPounds',
            'shrimpMeatPounds',
            'totalCostOfLiveLobster',
            'totalCostOfFrozenLobster',
            'totalCostOfClamMeat',
            'totalCostOfShrimp',
            'liveLobsterUnitPrice',
            'frozenLobsterUnitPrice',
            'clamMeatUnitPrice',
            'shrimpMeatUnitPrice',
            'subTotal',
            'shippingCost',
            'finalCost',
    ];
}
