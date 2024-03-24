<?php
namespace App\Services;

use App\Http\Resources\AwardResource;
use App\Http\Resources\BranchResource;
use App\Http\Resources\InfoResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\SocialMediaResource;
use App\Models\Award;
use App\Models\Branch;
use App\Models\Info;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialMedia;

final class GetHomeDetail
{
    function execute()
    {
        return cache()->rememberForever('home_page', function () {
            $language = app()->getLocale();
            $info = Info::firstWhere('language', $language);
            $slider = Slider::all();
            $products = Product::all();
            $settings = Setting::all();
            $catalogue = $settings->firstWhere('key', Setting::CATALOGUE_URL);
            $awards = Award::all();
            $branches = Branch::all();
            $socialMedia = SocialMedia::all();
            [$contactPhones, $contactMobiles, $contactEmails, $contactFax] = [
                $settings->firstWhere('key', Setting::CONTACT_PHONES),
                $settings->firstWhere('key', Setting::CONTACT_MOBILES),
                $settings->firstWhere('key', Setting::CONTACT_EMAILS),
                $settings->firstWhere('key', Setting::CONTACT_FAX),
            ];
            return [
                'data' => [
                    'slider' => SliderResource::collection($slider),
                    'content' => new InfoResource($info),
                    'catalogue' => [
                        'url' => (!empty (data_get($catalogue, 'value'))) ? route('api.catalogue.download') : null,
                        'products' => ProductResource::collection($products),
                    ],
                    'awards' => AwardResource::collection($awards),
                    'branches' => BranchResource::collection($branches),
                    'contacts' => [
                        'info' => [
                            'contactPhones' => data_get($contactPhones, 'formatted_value'),
                            'contactMobiles' => data_get($contactMobiles, 'formatted_value'),
                            'contactEmails' => data_get($contactEmails, 'formatted_value'),
                            'contactFax' => data_get($contactFax, 'formatted_value'),
                        ],
                        'social_media' => SocialMediaResource::collection($socialMedia),
                    ]
                ]
            ];
        });
    }
}
