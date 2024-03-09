<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function peutEnregistrerAujourdhui()
    {

        $userLog = Auth::user();
        $dateAujourdhui = Carbon::now()->format('Y-m-d');

        $presenceExistante = self::where('user_id', $userLog->id)
            ->whereDate('date_du_jour', $dateAujourdhui)
            ->exists();
        // dd($presenceExistante);
        return !$presenceExistante;
    }
}