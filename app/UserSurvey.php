<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class UserSurvey extends Model
{
    public function scopeGetSurvey()
    {
        return Survey::find($this->survey_id);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
