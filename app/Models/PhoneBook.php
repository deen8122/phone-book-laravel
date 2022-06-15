<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;

    protected $appends = ["imageFullPath"];

    protected $fillable = [
        "name",
        "description",
        "phone"
    ];

    public function getImageFullPathAttribute()
    {
        if($this->image){
            return "/public/Images/".$this->image;
        }
       return null;
    }

    public function setPhoneAttribute($value) {
        $phoneClear = str_replace("+7","8",$value);
        $phoneClear = preg_replace("/[^0-9]/", '', $phoneClear);
        $this->attributes['phone'] = $phoneClear;
    }
}
