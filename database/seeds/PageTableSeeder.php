<?php

use Illuminate\Database\Seeder;
use App\Page;
use App\PageTranslation;
class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // [
            //     'slug'=>'about-us',
            //     'name_ar'=>'من نحن',
            //     'name_en'=>'About Us',
            // ],
            [
                'slug'=>'policy',
                'name_ar'=>'السياسات',
                'name_en'=>'Policy',
            ],
            [
                'slug'=>'terms-and-conditions',
                'name_ar'=>'الأحكام والشروط',
                'name_en'=>'terms and conditions',
     
            ]
        ];
        foreach($data as $page){
            // dd($page);
            if(!Page::whereSlug($page['slug'])->exists()){
                $item = Page::create([
                    'slug'=>$page['slug']
                ]);
                PageTranslation::create([
                        'name'=>$page['name_ar'],
                        'body'=>'',
                        'locale'=>'ar',
                        'page_id'=>$item->id
                    ]);

                PageTranslation::create([
                        'name'=>$page['name_en'],
                        'body'=>'',
                        'locale'=>'en',
                        'page_id'=>$item->id
                    ]);

            }
        }
        // if(!Page::whereSlug('about-us')->exists()){
        //     $aboutPage = Page::create([
        //         'slug'=>'about-us'
        //     ]);
        //     $aboutPagetranslationAr = PageTranslation::create([
        //         'name'=>'من نحن',
        //         'body'=>'',
        //         'locale'=>'ar',
        //         'page_id'=>$aboutPage->id
        //     ]);

        //     $aboutPagetranslationEr = PageTranslation::create([
        //         'name'=>'About Us',
        //         'body'=>'',
        //         'locale'=>'en',
        //         'page_id'=>$aboutPage->id
        //     ]);
        // }
    }
}
