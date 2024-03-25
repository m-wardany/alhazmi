<?php
namespace App\Services;

use App\Http\Resources\AwardResource;
use App\Http\Resources\BranchResource;
use App\Http\Resources\InfoResource;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\SocialMediaResource;
use App\Models\Award;
use App\Models\Branch;
use App\Models\Info;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialMedia;

final class GetHomeDetail
{
    function execute()
    {
        $language = app()->getLocale();
        return cache()->rememberForever($language . '_home_page', function () use ($language) {
            $info = Info::firstWhere('language', $language);
            $slider = Slider::all();
            $products = Product::all();
            $settings = Setting::all();
            $catalogue = $settings->firstWhere('key', Setting::CATALOGUE_URL);
            $awards = Award::all();
            $branches = Branch::all();
            $partners = Partner::all();
            $socialMedia = SocialMedia::all();
            [$contactPhones, $contactMobiles, $contactEmails, $contactFax, $whatsapp] = [
                $settings->firstWhere('key', Setting::CONTACT_PHONES),
                $settings->firstWhere('key', Setting::CONTACT_MOBILES),
                $settings->firstWhere('key', Setting::CONTACT_EMAILS),
                $settings->firstWhere('key', Setting::CONTACT_FAX),
                $settings->firstWhere('key', Setting::CONTACT_WHATSAPP_URL),
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
                    'partners' => [
                        PartnerResource::collection($partners->where('slider', Partner::SLIDER_A)),
                        PartnerResource::collection($partners->where('slider', Partner::SLIDER_B)),
                    ],
                    'contacts' => [
                        'info' => [
                            'contactPhones' => data_get($contactPhones, 'formatted_value'),
                            'contactMobiles' => data_get($contactMobiles, 'formatted_value'),
                            'contactEmails' => data_get($contactEmails, 'formatted_value'),
                            'contactFax' => data_get($contactFax, 'formatted_value'),
                            'whatsapp' => data_get($whatsapp, 'formatted_value'),
                        ],
                        'social_media' => SocialMediaResource::collection($socialMedia),
                    ]
                ]
            ];
        });
    }
}
