<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];
    protected $dates = ['date'];

    public function registrations(){
        return $this->hasMany(Registration::class);
    }

    /**
     * @param User $user
     * @return Registration
     */
    public function register(User $user){
        return $this->registrations()->create([
            'user_id' => $user->id
        ]);
    }

    public function getFormattedPriceAttribute() {
        return number_format($this->fee / 100, 2);
    }

    public function getFormattedDateAttribute() {
        return $this->date->toFormattedDateString();
    }
}
