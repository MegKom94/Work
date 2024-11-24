<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AbtDates;

class AbtDatesTypes extends Model{
	public $table = 'abt_dates_types';
	public $timestamps = false;
	protected $guarded = [];
	
	static function relationship(){
		return [
			'AbtDates'=>[
				'class'=>AbtDates::class,
				'0'=>'id_type',
				'1'=>'id',
			],
		];
	}

	function AbtDates(){
		$model = 'AbtDates';
		return $this->hasMany(self::relationship()[$model]['class'], self::relationship()[$model]['0'], self::relationship()[$model]['1']);
	}
}