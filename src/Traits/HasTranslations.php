<?php

namespace Tadcms\System\Traits;

use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait HasTranslations
{
    use BaseHasTranslations;

    public function setTranslationDefault(string $key, $value)
    {
        $locale = $this->getLocale();
        return $this->setTranslation($key, $locale, $value);
    }
}
