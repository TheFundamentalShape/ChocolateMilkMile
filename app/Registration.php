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

    public function checkIn() {
        $this->checked_in_at = Carbon::now();
        $this->save();
        return $this;
    }

    public function scopeConfirmed($query)
    {
        return $query->where('confirmed_at', '!=', null);
    }

    public function getPriceAttribute() {
        return $this->event()->first()->fee;
    }

    public function toArray()
    {
        return [
            'confirmation_number' => $this->confirmation_number,
            'price' => $this->price,
            'checked_in_at' => $this->checked_in_at,
            'registrant' => [
                'name' => $this->name,
                'email' => $this->email
            ]
        ];
    }
}
