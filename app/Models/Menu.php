<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    const CATEGORY = [
        1 => ['label' => '肉料理'],
        2 => ['label' => '魚料理'],
        3 => ['label' => 'サラダ'],
        4 => ['label' => 'ドリンク'],
        5 => ['label' => 'デザート'],
        6 => ['label' => 'その他'],
    ];

    public function getCategoryLabelAttribute()
    {
        $category = $this->attributes['category'];

        return self::CATEGORY[$category]['label'];
    }

    // hasMany
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
