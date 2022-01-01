<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Sauna extends Model
{
    protected $fillable = ['name', 'city_id', 'address', 'holiday_id', 'start_time', 'end_time', 'price', 'url', 'tag_checks', 'pic1'];



    const HOLIDAY = [
        // 1 => ['holiday' => '月曜日'],
        // 2 => ['holiday' => '火曜日'],
        // 3 => ['holiday' => '水曜日'],
        // 4 => ['holiday' => '木曜日'],
        // 5 => ['holiday' => '金曜日'],
        // 6 => ['holiday' => '土曜日'],
        // 7 => ['holiday' => '日曜日'],
        8 => ['label' => '不定休'],
    ];

    // const CITIES = [
    //     1 => ['label' => '新潟市'],
    //     2 => ['label' => '長岡市'],
    //     3 => ['label' => '三条市'],
    //     4 => ['label' => '柏崎市'],
    //     5 => ['label' => '佐渡'],
    // ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\SaunaReview');
    }

    // public function getHolidayLabelAttribute()
    // {
        
    //     $holiday = $this->attributes['holiday_id'];

    //     if(!isset(self::HOLIDAY[$holiday])){
    //         return '';
    //     }

    //     return self::HOLIDAY[$holiday]['label'];
    //     }



    // public function getCityLabelAttribute()
    // {
    //     // $city = $this->attributes['city_id'];

    //     // if(!isset(self::CITIES[$city])){
    //     //     return '';
    //     // }

    //     // return self::CITIES[$city]['label'];
    // }

    public function getCityNameAttribute()
    {
        $cities = [
            '1' => '新潟市',
            '2' => '長岡市',
            '3' => '上越市',
            '4' => '三条市',
            '5' => '柏崎市',
            '6' => '佐渡市'
        ];

        return Arr::get($cities, $this->city_id);
    }

    public function getHolidayNameAttribute()
    {
        $holidays = [
            '1' => '月曜日',
            '2' => '火曜日',
            '3' => '水曜日',
            '4' => '木曜日',
            '5' => '金曜日',
            '6' => '土曜日',
            '7' => '日曜日',
            '8' => '不定休'
        ];

        return Arr::get($holidays, $this->holiday_id);

    }
    Public function scopeMostReviewSort($query)
{
    return $query->orderBy('reviews_count','desc');
}


}
    

