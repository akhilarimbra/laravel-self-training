<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NiceAction extends Model {
    public function loggedActions () {
        return $this->hasMany('App\NiceActionLog');
    }
}
