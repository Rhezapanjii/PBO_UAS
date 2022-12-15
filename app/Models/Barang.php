<?php

namespace App\Models;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Barang extends Model
{
    use LogsActivity;
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="barang";
    protected $fillable = [
        'nama',
        'jumlah',
        'harga',
        'tanggalKadaluarsa',
    ];
    protected static $logName = 'Barang';
    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " {$eventName} Oleh: " . Auth::user()->name;
    }


    // public function tapActivity(Activity $activity, string $eventName)
    // {
    //     $activity->type = "Barang";
    // }
    protected static $logOnlyDirty = true;

}
