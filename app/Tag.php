<?php namespace PHPKonf;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tags';

    public function announcements() {
        return $this->belongsToMany('PHPKonf\Announcement');
    }

    public function videos() {
        return $this->belongsToMany('PHPKonf\Video');
    }

}
