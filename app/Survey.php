<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function scopeGetUser()
    {
        return User::find($this->user_id);
    }

}
