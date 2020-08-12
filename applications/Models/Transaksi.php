<?php
namespace App\Models;
use Model;

class Transaksi extends Model
{
    static $table = "transaksi";

    function pelanggan()
    {
        return $this->hasOne(Pelanggan::class,['id'=>'id_pelanggan']);
    }
}