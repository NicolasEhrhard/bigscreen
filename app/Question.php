<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $lastChoiceSelected = '';
    public function scopeGetChoices()
    {
        return json_decode($this->choice);
    }

    public function scopeChoiceChange(){
        print_r('$this');
        $this->lastChoiceSelected = '';
    }

    public function scopeCheckSelectedChoice(){
        return $this->lastChoiceSelected == 'Autre';
    }
}
