<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reptile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function birth(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value === NULL ? "" :  date('Y-m-d', strtotime($value))
        );
    }

    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == "m" ? "수" : ($value == "f" ? "암" : "미구분")
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
          get: fn($value) => $value == "g" ? "키우는 중"
            : ($value == "i" ? "위탁 중" : ($value == "o" ? "위탁 보냄" :
                  ($value == "s" ? "분양" : "사망")))
        );
    }

    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value === NULL ? "" : (
                $value >= 12 ?
                    (string)(floor($value/12))."년 ".(string)($value % 12)."개월"
                    : (string)$value."개월"
            )
        );
    }

    public function scopeListByUserId($query, $userId)
    {
        return $query->select("id", "name")->where("user_id", $userId);
    }

    public function scopeConditionGender($query, $gender = "u")
    {
        return $query->where("gender", $gender);
    }

    public function scopeSearchByName($query, $searchString)
    {
        return $query->where("name", "like", "%$searchString%");
    }
}
