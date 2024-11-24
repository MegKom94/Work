<?php

namespace App\Models;

use App\Http\sources\SoftDeleteFlagTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\FormsAnswers;
use App\Models\FormsTypes;


class Forms extends Model{
	use SoftDeleteFlagTrait;

	public $table = 'lk.forms';
	public $timestamps = false;
	protected $guarded = [];

	const DELETED_AT = 'is_deleted';
	
	static function relationship(){
		return [
			'FormsTypes'=>[
				'class'=>FormsTypes::class,
				'0'=>'id',
				'1'=>'id_type',
			],
			'FormsAnswers'=>[
				'class'=>FormsAnswers::class,
				'0'=>'id_form',
				'1'=>'id',
			],
		];
	}

	function FormsTypes(){
		$model = 'FormsTypes';
		return $this->hasMany(self::relationship()[$model]['class'], self::relationship()[$model]['0'], self::relationship()[$model]['1']);
	}

	function FormsAnswers(){
		$model = 'FormsAnswers';
		return $this->hasMany(self::relationship()[$model]['class'], self::relationship()[$model]['0'], self::relationship()[$model]['1']);
	}
}