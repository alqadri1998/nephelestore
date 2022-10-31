<?php
namespace App\Traits;
trait WithTranslationTrait
{
    public static function createWithTranslations(array $data){
        $item = static::create($data);
        $locales = ['en', 'ar'];
        foreach ($locales as $locale) {
            foreach($item->translatedAttributes as $attribute){
              	$item->translateOrNew($locale)->$attribute = isset($data[$locale][$attribute]) ? $data[$locale][$attribute] : '';
            }
        }
        $item->save();
        return $item;
    }

    public function updateWithTranslations(array $data){

        $this->update($data);
        $locales = ['en', 'ar'];
        foreach ($locales as $locale) {
            foreach($this->translatedAttributes as $attribute){
              $this->translateOrNew($locale)->$attribute = isset($data[$locale][$attribute]) ? $data[$locale][$attribute] : '';
            }
        }
        $this->save();
        return $this;
    }
}
