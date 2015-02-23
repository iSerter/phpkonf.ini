<?php namespace PHPKonf;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

	protected $table = 'videos';

    public function tags() {
        return $this->belongsToMany('PHPKonf\Tag');
    }
}
