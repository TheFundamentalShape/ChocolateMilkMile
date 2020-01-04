<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'fee', 'location', 'date'];
    protected $dates = ['date'];

    public function registrations(){
        return $this->hasMany(Registration::class);
    }

    /**
     * @param User $user
     * @return Registration
     */
    public function register($registrant){
        return $this->registrations()->create($registrant);
    }

    public function getFormattedPriceAttribute() {
        return number_format($this->fee / 100, 2);
    }

    public function getFormattedDateAttribute() {
        return $this->date->toFormattedDateString();
    }
}
