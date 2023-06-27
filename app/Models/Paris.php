<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class paris extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idparis';

    protected $table = 'paris';

    protected $fillable = ['paris'];

    public static function getParis(int $idparis = null)
    {
        return self::query()->select('paris.*', 'Ch.*', 'Pr.*', 'M.*')
            ->join('choix AS Ch', 'paris.idchoix', '=', 'Ch.idchoix')
            ->join('pronostique AS Pr', 'Ch.idprono', '=', 'Pr.idprono')
            ->join('matchs AS M', 'Pr.idmatch', '=', 'M.idmatch')
            ->where('paris.idparis', $idparis)->first();
    }
    public static function getPari(int $idparis = null)
    {
        return self::query()->where('paris.idparis', $idparis)->first();
    }
    public static function getParisByUser()
    {
        $user= Session::get('user');
        return self::query()->select('paris.*', 'Ch.*', 'Pr.*', 'M.*', 'Ch.statut as statutc')
        ->join('choix AS Ch', 'paris.idchoix', '=', 'Ch.idchoix')
        ->join('pronostique AS Pr', 'Ch.idprono', '=', 'Pr.idprono')
        ->join('matchs AS M', 'Pr.idmatch', '=', 'M.idmatch')
        ->where('paris.iduser', $user->id)
        ->orderBy('paris.created_at')->get();
    }
    public static function getAllParis(array $where = NULL)
    {
        if($where!==NULL){
            return self::query()->select('paris.*', 'Ch.*', 'Pr.*', 'M.*', 'Ch.statut as statutc')
            ->join('choix AS Ch', 'paris.idchoix', '=', 'Ch.idchoix')
            ->join('pronostique AS Pr', 'Ch.idprono', '=', 'Pr.idprono')
            ->join('matchs AS M', 'Pr.idmatch', '=', 'M.idmatch')
            ->orderBy('paris.created_at')->where($where)->get();
        }
        return self::query()->select('paris.*', 'Ch.*', 'Pr.*', 'M.*', 'Ch.statut as statutc')
        ->join('choix AS Ch', 'paris.idchoix', '=', 'Ch.idchoix')
        ->join('pronostique AS Pr', 'Ch.idprono', '=', 'Pr.idprono')
        ->join('matchs AS M', 'Pr.idmatch', '=', 'M.idmatch')
        ->orderBy('paris.created_at')->get();
    }
}
