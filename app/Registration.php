<?php

namespace App;

use App\Events\RegistrantCheckedIn;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\AlreadyCheckedInException;

class Registration extends Model
{
    protected $guarded = [];

    // returns the User
    public function user(){
        return $this->belongsTo(User::class);
    }

    // returns the Event
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
        if($this->checked_in_at == null) {

            $this->update([
                'checked_in_at' => Carbon::now()
            ]);

            return $this;
        }

        throw new AlreadyCheckedInException();

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
            'created_at' => $this->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a'),
            'price' => $this->price,
            'checked_in_at' => $this->checked_in_at,
            'registrant' => [
                'name' => $this->name,
                'email' => $this->email
            ],
            'event' => $this->event
        ];
    }
}
