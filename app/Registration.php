<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\ConfirmationIssuer;

class Registration extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function cancel() {
        $this->delete();
    }

    public function confirm() {
        $this->update([
            'confirmed_at' => Carbon::now(),
            'confirmation_number' => ConfirmationIssuer::issueConfirmationNumber()
        ]);
    }

    public function getPriceAttribute() {
        return $this->event()->first()->fee;
    }

    public function toArray()
    {
        return [
            'confirmation_id' => rand(1000, 9999),
            'price' => $this->price,
            'user' => $this->user()->first()->toArray()
        ];
    }
}
