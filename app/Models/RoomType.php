<?php

namespace App\Models;

use App\Http\sources\ConfigurableTrait;
use App\Http\sources\SoftDeleteFlagTrait;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use ConfigurableTrait;
    use SoftDeleteFlagTrait;
    protected $table = 'room_type';
    protected $fillable = [
        'id',
        'id_parent',
        'name'
    ];
    const DELETED_AT = 'is_deleted';
    public function rooms()
    {
        return $this->hasMany(Room::class, 'id_type');
    }
    public function roomTypes()
    {
        return $this->hasMany(RoomType::class, 'id_parent');
    }
    public function listRoomTypes()
    {
        return $this->belongsTo(RoomType::class, 'id');
    }
}
