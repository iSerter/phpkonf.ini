<?php namespace PHPKonf;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model {

	protected $table = 'announcements';

    public function tags() {
        return $this->belongsToMany('PHPKonf\Tag');
    }
}
