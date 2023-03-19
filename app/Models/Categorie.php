<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorie
 * 
 * @property int $idcat
 * @property string|null $designation
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Categorie extends Model
{
	protected $table = 'categorie';
	protected $primaryKey = 'idcat';
	public $timestamps = false;

	protected $fillable = [
		'designation'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'categorie');
	}
}
