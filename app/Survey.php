<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['name','id'];

    public function userSurveys()
    {
        return $this->hasMany(UserSurvey::class);
    }

    public function scopeGetUserSurveys()
    {
        return UserSurvey::where('survey_id',$this->id);
    }

}
