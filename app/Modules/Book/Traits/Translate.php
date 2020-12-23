<?php

namespace App\Modules\Book\Traits;

trait Translate
{
    protected $defaultLocal = 'ru';

    public function __($originFieldName)
    {
        $locale = \App::getLocale() ?? $this->defaultLocal;

        if ($locale == 'en') {
            $fieldName = $originFieldName . '_en';
        } else {
            $fieldName = $originFieldName;
        }

        if ($locale == 'en' && (is_null($this->$fieldName) || empty($this->$fieldName))) {
            return $this->$originFieldName;
        }

        return $this->$fieldName;
    }
}
