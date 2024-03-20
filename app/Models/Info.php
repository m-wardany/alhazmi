<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'about',
        'vesion',
        'message',
        'value_professional',
        'value_innovation',
        'value_quality',
        'duty_customer',
        'duty_products',
        'duty_markets',
        'goals_1_title',
        'goals_1_body',
        'goals_2_title',
        'goals_2_body',
        'goals_3_title',
        'goals_3_body',
        'goals_4_title',
        'goals_4_body',
        'goals_5_title',
        'goals_5_body',
        'goals_6_title',
        'goals_6_body',
        'goals_7_title',
        'goals_7_body',
        'goals_8_title',
        'goals_8_body',
        'team',
        'responsibilities',
        'integrity',
    ];

    protected $casts = [
        'contact_fax' => 'array',
        'contact_phone' => 'array',
        'contact_email' => 'array',
    ];

    function getTable()
    {
        return 'info';
    }

    function getGoal1Attribute()
    {
        return [
            'title' => $this->goals_1_title,
            'body' => $this->goals_1_body,
        ];
    }

    function getGoal2Attribute()
    {
        return [
            'title' => $this->goals_2_title,
            'body' => $this->goals_2_body,
        ];
    }

    function getGoal3Attribute()
    {
        return [
            'title' => $this->goals_3_title,
            'body' => $this->goals_3_body,
        ];
    }

    function getGoal4Attribute()
    {
        return [
            'title' => $this->goals_4_title,
            'body' => $this->goals_4_body,
        ];
    }

    function getGoal5Attribute()
    {
        return [
            'title' => $this->goals_5_title,
            'body' => $this->goals_5_body,
        ];
    }

    function getGoal6Attribute()
    {
        return [
            'title' => $this->goals_6_title,
            'body' => $this->goals_6_body,
        ];
    }

    function getGoal7Attribute()
    {
        return [
            'title' => $this->goals_7_title,
            'body' => $this->goals_7_body,
        ];
    }

    function getGoal8Attribute()
    {
        return [
            'title' => $this->goals_8_title,
            'body' => $this->goals_8_body,
        ];
    }

}
