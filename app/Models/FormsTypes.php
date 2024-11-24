<?php

namespace App\Models;

use App\Http\sources\SoftDeleteFlagTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forms;

class FormsTypes extends Model{
	use SoftDeleteFlagTrait;
	public $table = 'lk.forms_types';
	public $timestamps = false;
	protected $guarded = [];

	static function relationship(){
		return [
			'Forms'=>[
				'class'=>Forms::class,
				'0'=>'id_type',
				'1'=>'id',
			],
		];
	}

	function Forms(){
		$model = 'Forms';
        //Вопрс зачем релейшен реализован через вызов праметров в функции? второй почему вызов функции 3 раза?
		return $this->hasMany(self::relationship()[$model]['class'], self::relationship()[$model]['0'], self::relationship()[$model]['1']);
	}
}
