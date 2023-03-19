<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property int $idarticle
 * @property string $titre
 * @property int|null $categorie
 * @property string $contenue
 * @property string|null $resume
 * 
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'article';
	protected $primaryKey = 'idarticle';
	public $timestamps = false;

	protected $casts = [
		'categorie' => 'int'
	];

	protected $fillable = [
		'titre',
		'categorie',
		'contenue',
		'resume'
	];

	public function Categorie()
	{
		return $this->belongsTo(Categorie::class, 'categorie');
	}
}
