<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use \App\Traits\UpdateCache;

    const CONTACT_PHONES = 'contact_phones';
    const CONTACT_MOBILES = 'contact_mobiles';
    const CONTACT_FAX = 'contact_fax';
    const CONTACT_EMAILS = 'contact_emails';
    const CONTACT_WHATSAPP_URL = 'contact_whatsapp_url';
    const CATALOGUE_URL = 'catalogue_url';

    use HasFactory;

    protected $fillable = [
        'key',
        'value'
    ];

    function getFormattedValueAttribute(): string
    {
        switch ($this->key) {
            case self::CONTACT_PHONES:
            case self::CONTACT_EMAILS:
            case self::CONTACT_FAX:
            case self::CONTACT_MOBILES:
                return implode(', ', array_map('trim', explode("\n", str_replace(['<br>', "\r"], "\n", $this->value))));
            case self::CATALOGUE_URL:
                return asset('storage/' . $this->value);
            case self::CONTACT_WHATSAPP_URL:
                return sprintf('https://api.whatsapp.com/send?phone=%s', $this->value);
            default:
                return $this->value;
        }
    }
}
