<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['name','id'];

    public function userSurveys()
    {
        return $this->hasMany(UserSurvey::class)->orderByDesc('created_at');;
    }



}
