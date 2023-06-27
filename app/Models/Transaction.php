<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Transaction extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idtrans';

    protected $table = 'transaction';

    protected $fillable = ['transaction'];

    public static function getTrans(int $idtrans = null)
    {
        $user= Session::get('user');
        return self::query()->where('idtrans', $idtrans)->where('idprono', $idtrans)->first();
    }

    public static function getAllTrans()
    {
        $user= Session::get('user');
        return self::query()->where('iduser', $user->iduser)->orderBy('created_at')->get();
    }

}
