<?php

namespace App\Traits;

/**
 * 
 */
trait HasLocale
{

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        $attribute = app()->getLocale() . '_' . $key;
        if ($value === null && array_key_exists($attribute, $this->attributes)) {
            if (empty ($this->translatable_attributes) || (!empty ($this->translatable_attributes) && in_array($key, $this->translatable_attributes))) {
                return $this->getAttributeValue($attribute);
            }
        }

        return $value;
    }
}
