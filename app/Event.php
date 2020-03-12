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
     * @param array $registrant
     * @return Registration
     */
    public function register($registrant){
        return $this->registrations()->create([
            'user_id' => $registrant['user_id'],
            'name' => $registrant['name'],
            'email' => $registrant['email'],
        ]);
    }

    public function getFormattedPriceAttribute() {
        return number_format($this->fee / 100, 2);
    }

    public function getFormattedDateAttribute() {
        return $this->date->toFormattedDateString();
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'fee' => $this->fee,
            'formatted_price' => $this->formatted_price,
            'location' => $this->location,
            'dates' => [
                'human' => $this->formatted_date,
                'full' => $this->date
            ]
        ];
    }

    public function toJson($options = 0)
    {
        return parent::toJson($options); // TODO: Change the autogenerated stub
    }
}
