<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class UserSurvey extends Model
{
    protected $fillable = ['user_id','survey_id','created_at'];

    public function scopeGetUser()
    {
        return User::find($this->user_id);
    }

    //A VERIFIER SI UTILISE
    public function scopeGetSurvey()
    {
        return Survey::find($this->survey_id);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
