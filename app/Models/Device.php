<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    protected $fillable = [
        'descripcion',
        'inventario',
        'fecha_compra',
        'device_type_id',
        'area_id',
        'user_id',
    ];
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function deviceType()
    {
        return $this->belongsTo(Device_type::class, 'device_type_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
