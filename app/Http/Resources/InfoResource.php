<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'about' => $this->about,
            'vesion' => $this->vesion,
            'message' => $this->message,
            'value_professional' => $this->value_professional,
            'value_innovation' => $this->value_innovation,
            'value_quality' => $this->value_quality,
            'duty_customer' => $this->duty_customer,
            'duty_products' => $this->duty_products,
            'duty_markets' => $this->duty_markets,
            'goals_1' => [
                'title' => $this->goals_1_title,
                'body' => $this->goals_1_body,
            ],
            'goals_2' => [
                'title' => $this->goals_2_title,
                'body' => $this->goals_2_body,
            ],
            'goals_3' => [
                'title' => $this->goals_3_title,
                'body' => $this->goals_3_body,
            ],
            'goals_4' => [
                'title' => $this->goals_4_title,
                'body' => $this->goals_4_body,
            ],
            'goals_5' => [
                'title' => $this->goals_5_title,
                'body' => $this->goals_5_body,
            ],
            'goals_6' => [
                'title' => $this->goals_6_title,
                'body' => $this->goals_6_body,
            ],
            'goals_7' => [
                'title' => $this->goals_7_title,
                'body' => $this->goals_7_body,
            ],
            'goals_8' => [
                'title' => $this->goals_8_title,
                'body' => $this->goals_8_body,
            ],
            'team' => $this->team,
            'responsibilities' => $this->responsibilities,
            'integrity' => $this->integrity,
        ];
    }
}
