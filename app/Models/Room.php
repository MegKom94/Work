<?php

namespace App\Models;

use App\Http\sources\ConfigurableTrait;
use App\Http\sources\SoftDeleteFlagTrait;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use ConfigurableTrait;
    use SoftDeleteFlagTrait;
    protected $table = 'room';
    protected $dateFormat = 'U';
    protected $fillable = [
        'id',
        'name',
        'description',
        'places',
        'places_work',
        'floor',
        'build',
        'serial_number',
        'id_type',
        'number',
        'id_dep',
        'owner_id',
        'owner_name',
        'is_workshop',
        'is_show'
    ];
    const DELETED_AT = 'is_deleted';
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'id');
    }
    public function department()
    {
        return $this->belongsTo(RoomType::class, 'id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
