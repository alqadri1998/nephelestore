<?php

use App\City;
// use App\Country;
use Illuminate\Database\Seeder;

class CountryCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                //Area
                'name'=>[
                        'ar'    => 'مكة المكرمة',
                        'en'    => 'Mecca',
                    ],
                    'cities'=>[
                        [
                            "ar" => "مكة",
                            "en" => "Mecca",
                        ],
                        [
                            "ar" => "جدة",
                            "en" => "Jeddah",
                        ],
                        [
                            "ar" => "الطائف",
                            "en" => "Taif",
                        ],
                        [
                            "ar" => "القنفذة",
                            "en" => "Al-Qunfudhah",
                        ],
                        [
                            "ar" => "الليث",
                            "en" => "Laith",
                        ],
                        [
                            "ar" => "بحرة",
                            "en" => "Bahra",
                        ],
                        [
                            "ar" => "رابغ",
                            "en" => "Rabigh",
                        ],
                        [
                            "ar" => "الجموم",
                            "en" => "Al-Jumum",
                        ],
                        [
                            "ar" => "خليص",
                            "en" => "Khulais",
                        ],
                        [
                            "ar" => "رنية",
                            "en" => "Rune",
                        ],
                        [
                            "ar" => "الخرمة",
                            "en" => "Khurma",
                        ],
                        [
                            "ar" => "العرضيات",
                            "en" => "Al-Eardiaat",
                        ],
                        [
                            "ar" => "أضم",
                            "en" => "Adham",
                        ],
                        [
                            "ar" => "تربة",
                            "en" => "Turubah",
                        ],
                        [
                            "ar" => "الكامل",
                            "en" => "Alkamil",
                        ],
                        [
                            "ar" => "المويه",
                            "en" => "Almoeh",
                        ],
                        [
                            "ar" => "ميسان",
                            "en" => "Missan",
                        ],
                        [
                            "ar" => "مدينة الملك عبد الله الاقتصادية",
                            "en" => "King Abdullah Economic City",
                        ],

                    ],

            ],//01
            [
                'name'=>[
                    'ar'    => 'المدينة المنورة',
                    'en'    => 'Medina El Monawara',
                ],
                'cities'=>[
                        [
                            "ar" => "المدينة المنورة",
                            "en" => "Medina",
                        ],
                        [
                            "ar" => "ينبع",
                            "en" => "Yanbu",
                        ],
                        [
                            "ar" => "العلا",
                            "en" => "Al-'Ula",
                        ],
                        [
                            "ar" => "مهد الذهب",
                            "en" => "Mahd adh Dhahab",
                        ],
                        [
                            "ar" => "الحناكية",
                            "en" => "Hanakia",
                        ],
                        [
                            "ar" => "بدر",
                            "en" => "Badr",
                        ],
                        [
                            "ar" => "خيبر",
                            "en" => "Khaybar",
                        ],
                        [
                            "ar" => "الفريش",
                            "en" => "Al-Furaysh",
                        ],
                        [
                            "ar" => "دثير",
                            "en" => "Dthir",
                        ],
                        [
                            "ar" => "الصويدرة",
                            "en" => "Essaouira",
                        ],
                ],
            ],//2
            [
                'name'=>[
                    'ar'    => 'الرياض',
                    'en'    => 'Riyadh',
                ],
                'cities'=>[
                    [
                        "ar" => "الرياض",
                        "en" => "Riyadh",
                    ],
                    [
                        "ar" => "السيح",
                        "en" => "Seeh",
                    ],
                    [
                        "ar" => "الزلفي",
                        "en" => "Zulfi",
                    ],
                    [
                        "ar" => "الدرعية",
                        "en" => "Diriyah",
                    ],
                    [
                        "ar" => "الدلم",
                        "en" => "Al-dilm",
                    ],
                    [
                        "ar" => "الهياثم",
                        "en" => "Al-Hayatham",
                    ],
                    [
                        "ar" => "الدوادمي",
                        "en" => "Dawadmi",
                    ],
                    [
                        "ar" => "المجمعة",
                        "en" => "Al-Majma'ah",
                    ], [
                        "ar" => "القويعية",
                        "en" => "Al-Quway'iyah",
                    ],
                    [
                        "ar" => "وادي الدواسر",
                        "en" => "Wadi Al Dawasir",
                    ],
                    [
                        "ar" => "ليلى (الأفلاج)",
                        "en" => "Layla (town)",
                    ],
                    [
                        "ar" => "شقراء",
                        "en" => "Shaqraa",
                    ],
                    [
                        "ar" => "حوطة بني تميم",
                        "en" => "Hotat Bani Tamim",
                    ],
                    [
                        "ar" => "عفيف",
                        "en" => "Afif",
                    ],
                    [
                        "ar" => "مرات",
                        "en" => "Maraat",
                    ],
                    [
                        "ar" => "السليل",
                        "en" => "As Sulayyil",
                    ],
                    [
                        "ar" => "ضرما",
                        "en" => "Dhurma",
                    ],
                    [
                        "ar" => "المزاحمية",
                        "en" => "Muzahimiyah",
                    ],
                    [
                        "ar" => "رماح",
                        "en" => "Ramah",
                    ],
                    [
                        "ar" => "ثادق",
                        "en" => "Thadiq",
                    ],
                    [
                        "ar" => "حريملاء",
                        "en" => "Huraymila",
                    ],
                    [
                        "ar" => "الحريق",
                        "en" => "Al-hariq",
                    ],
                    [
                        "ar" => "الغاط",
                        "en" => "Ghat",
                    ],
                    [
                        "ar" => "أشيقر",
                        "en" => "Ushaiger",
                    ],
                ],
            ],//3
            [
                'name'=>[
                    'ar'    => 'المنطقة الشرقية',
                    'en'    => 'Eastern Province',
                ],
                'cities'=>[
                    [
                            "ar" => "الدمام",
                            "en" => "Dammam",
                        ],
                        [
                            "ar" => "الخبر",
                            "en" => "Khobar",
                        ],
                        [
                            "ar" => "الظهران",
                            "en" => "Dhahran",
                        ],
                        [
                            "ar" => "الأحساء",
                            "en" => "Al-Ahsa",
                        ],
                        [
                            "ar" => "حفر الباطن",
                            "en" => "Hafar al-Batin",
                        ],
                        [
                            "ar" => "الخفجي",
                            "en" => "Khafji",
                        ],
                        [
                            "ar" => "الجبيل",
                            "en" => "Jubail",
                        ],
                        [
                            "ar" => "القطيف",
                            "en" => "Qatif",
                        ],
                        [
                            "ar" => "النعيرية",
                            "en" => "Al-Nairyah",
                        ],
                        [
                            "ar" => "بقيق",
                            "en" => "Abqaiq",
                        ],
                        [
                            "ar" => "رأس تنورة",
                            "en" => "Ras Tanura",
                        ],
                        [
                            "ar" => "قرية العليا",
                            "en" => "Qaryat al-Ulya",
                        ],
                        
                ],
            ],//4
            [
                'name'=>[
                    'ar'    => 'القصيم',
                    'en'    => 'Al-Qassim',
                ],
                'cities'=>[
                     [
                            "ar" => "بريدة",
                            "en" => "Buraidah",
                        ],
                        [
                            "ar" => "عنيزة",
                            "en" => "Unaizah",
                        ],
                        [
                            "ar" => "الرس",
                            "en" => "Ar Rass",
                        ],
                        [
                            "ar" => "البكيرية",
                            "en" => "Bukayriyah",
                        ],
                        [
                            "ar" => "البدائع",
                            "en" => "Al-Badayea",
                        ],
                        [
                            "ar" => "النبهانية",
                            "en" => "Nabhani",
                        ],
                        [
                            "ar" => "المذنب",
                            "en" => "Al-mudhanib",
                        ],
                        [
                            "ar" => "رياض الخبراء",
                            "en" => "Riyadh Al Khabra",
                        ],
                        [
                            "ar" => "عيون الجواء",
                            "en" => "Oyoun Al-Jawa",
                        ],
                        [
                            "ar" => "الشماسية",
                            "en" => "Al-shamasia",
                        ],
                        [
                            "ar" => "عقلة الصقور",
                            "en" => "Uqlat Al-Suqur",
                        ],
                        
                ],
            ],//5
            [
                'name'=>[
                    'ar'    => 'حائل',
                    'en'    => 'Hail',
                ],
                'cities'=>[
                     [
                            "ar" => "حائل",
                            "en" => "Hail",
                        ],
                        [
                            "ar" => "بقعاء",
                            "en" => "Baqaa",
                        ],
                        [
                            "ar" => "الغزالة",
                            "en" => "Ghazala",
                        ],
                        [
                            "ar" => "الشنان",
                            "en" => "Al-Shinan",
                        ],
                        [
                            "ar" => "الشملي",
                            "en" => "Shamli",
                        ],
                        [
                            "ar" => "سميراء",
                            "en" => "Samira",
                        ],
                        [
                            "ar" => "موقق",
                            "en" => "Muqaq",
                        ],
                        [
                            "ar" => "الحائط",
                            "en" => "Al-Hayit",
                        ],
                        [
                            "ar" => "السليمي",
                            "en" => "Sulaimi",
                        ],
                        [
                            "ar" => "أم القلبان",
                            "en" => "Umm Al Qalban",
                        ],
                        [
                            "ar" => "طابة",
                            "en" => "Taba",
                        ],
                        [
                            "ar" => "قفار",
                            "en" => "Qafaar",
                        ],
                        [
                            "ar" => "الكهفة",
                            "en" => "Al-Kahfa",
                        ],
                        [
                            "ar" => "فيد",
                            "en" => "Fid",
                        ],
                        
                ],
            ],//6
            [
                'name'=>[
                    'ar'=>'عسير',
                    'en'=>'Asir',
                ],
                'cities'=>[
                     [
                            "ar" => "أبها",
                            "en" => "Abha",
                        ],
                        [
                            "ar" => "خميس مشيط",
                            "en" => "Khamis Mushait",
                        ],
                        [
                            "ar" => "بيشة",
                            "en" => "Bisha",
                        ],
                        [
                            "ar" => "محايل عسير",
                            "en" => "Muhail Asir",
                        ],
                        [
                            "ar" => "بارق",
                            "en" => "Bareq",
                        ],
                        [
                            "ar" => "النماص",
                            "en" => "Al-Namas",
                        ],
                        [
                            "ar" => "أحد رفيدة",
                            "en" => "Ahad Rafidah",
                        ],
                        [
                            "ar" => "ظهران الجنوب",
                            "en" => "Dhahran Al Janoub",
                        ],
                        [
                            "ar" => "سبت العلاية",
                            "en" => "Sabbat Al Alaya",
                        ],
                        [
                            "ar" => "سراة عبيدة",
                            "en" => "Sarat Abidah",
                        ],
                        [
                            "ar" => "المجاردة",
                            "en" => "Al-Majaridah",
                        ],
                        [
                            "ar" => "رجال ألمع",
                            "en" => "Rijal Almaa ",
                        ],
                        [
                            "ar" => "تثليث",
                            "en" => "Trinity",
                        ],
                        [
                            "ar" => "تنومة",
                            "en" => "Tanomah",
                        ],
                        [
                            "ar" => "طريب",
                            "en" => "Trib",
                        ],
                        [
                            "ar" => "البرك",
                            "en" => "Al-barak",
                        ],
                        
                ],
            ],//7
            [
                'name'=>[
                    'ar'=>'تبوك',
                    'en'=>'Tabuk',
                ],
                'cities'=>[
                    [
                            "ar" => "تبوك",
                            "en" => "Tabuk",
                        ],
                        [
                            "ar" => "تيماء",
                            "en" => "Taima",
                        ],
                        [
                            "ar" => "أملج",
                            "en" => "Umluj",
                        ],
                        [
                            "ar" => "الوجه",
                            "en" => "Al-Wajh",
                        ],
                        [
                            "ar" => "ضباء",
                            "en" => "Duba",
                        ],
                        [
                            "ar" => "حقل",
                            "en" => "Haql",
                        ],
                        [
                            "ar" => "البدع",
                            "en" => "Al-Bad'",
                        ],
                       
                ],
            ],//8
            [
                'name'=>[
                    'ar'=>'الجوف',
                    'en'=>'Al-Jawf',
                ],
                'cities'=>[
                    [
                            "ar" => "سكاكا",
                            "en" => "Sakakah",
                        ],
                        [
                            "ar" => "القريات",
                            "en" => "Qurayyat",
                        ],
                        [
                            "ar" => "دومة الجندل",
                            "en" => "Dumat al-Jandal",
                        ],
                        
                ],
            ],//9
            [
                'name'=>[
                    'ar'=>'منطقة الحدود الشمالية',
                    'en'=>'Northern Borders Province',
                ],
                'cities'=>[
                    [
                            "ar" => "عرعر",
                            "en" => "Arar",
                        ],
                        [
                            "ar" => "طريف",
                            "en" => "Turaif",
                        ],
                        [
                            "ar" => "رفحاء",
                            "en" => "Rafha",
                        ],
                        [
                            "ar" => "العويقيلة",
                            "en" => "Al-Awaqilah",
                        ],
                        
                ],
            ],//10
            [
                'name'=>[
                    'ar'=>'جازان',
                    'en'=>'Jazan',
                ],
                'cities'=>[
                    [
                            "ar" => "جيزان",
                            "en" => "Jizan",
                        ],
                        [
                            "ar" => "صبيا",
                            "en" => "Sabya",
                        ],
                        [
                            "ar" => "أبو عريش",
                            "en" => "Abu Arish",
                        ],
                        [
                            "ar" => "صامطة",
                            "en" => "Samtah",
                        ],
                        [
                            "ar" => "فيفاء",
                            "en" => "Fifa",
                        ],
                        [
                            "ar" => "بيش",
                            "en" => "Bish",
                        ],
                        [
                            "ar" => "الدرب",
                            "en" => "Al-Darb",
                        ],
                        [
                            "ar" => "العيدابي",
                            "en" => "Al-Aydabi",
                        ],
                        [
                            "ar" => "الدائر",
                            "en" => "Al-Daayir",
                        ],
                        [
                            "ar" => "الخوبة",
                            "en" => "Al-Khubah",
                        ],
                        [
                            "ar" => "العارضة",
                            "en" => "Arida",
                        ],
                        [
                            "ar" => "أحد المسارحة",
                            "en" => "Ahad Almusaraha",
                        ],
                        [
                            "ar" => "الريث",
                            "en" => "Al-Reeth",
                        ],
                        [
                            "ar" => "ضمد",
                            "en" => "Dammed",
                        ],
                        [
                            "ar" => "فرسان",
                            "en" => "Farasan",
                        ],
                        [
                            "ar" => "الطوال",
                            "en" => "Al-Tiwal",
                        ],
                        [
                            "ar" => "هروب",
                            "en" => "Harub",
                        ],
                        
                ],
            ],//11
            [
                'name'=>[
                    'ar'=>'نجران',
                    'en'=>'Najran',
                ],
                'cities'=>[
                    [
                            "ar" => "نجران",
                            "en" => "Najran",
                        ],
                        [
                            "ar" => "شرورة",
                            "en" => "Sharurah",
                        ],
                        [
                            "ar" => "حبونا",
                            "en" => "Hubuna",
                        ],
                        [
                            "ar" => "ثار",
                            "en" => "Thar",
                        ],
                        [
                            "ar" => "يدمة",
                            "en" => "Yadamah",
                        ],
                        [
                            "ar" => "بدر الجنوب",
                            "en" => "Badr Al Janub",
                        ],
                        [
                            "ar" => "خباش",
                            "en" => "Khubash",
                        ],
                        [
                            "ar" => "الخرخير",
                            "en" => "Al-Kharkhir",
                        ],
                       
                ],
            ],//12
            [
                'name'=>[
                    'ar'=>'الباحة',
                    'en'=>'Al-Bahah',
                ],
                'cities'=>[
                    [
                            "ar" => "الباحة",
                            "en" => "Al Bahah",
                        ],
                        [
                            "ar" => "المخواة",
                            "en" => "Al-Makhwah",
                        ],
                        [
                            "ar" => "بلجرشي",
                            "en" => "Baljurashi",
                        ],
                        [
                            "ar" => "المندق",
                            "en" => "Al-Mandaq",
                        ],
                        [
                            "ar" => "قلوة",
                            "en" => "Qilwah",
                        ],
                        [
                            "ar" => "القرى",
                            "en" => "Al-Qara",
                        ],
                        [
                            "ar" => "العقيق",
                            "en" => "Al-Eaqiq",
                        ],
                        [
                            "ar" => "الحجرة",
                            "en" => "Hajrah",
                        ],
                        [
                            "ar"=>"بني حسن",
                            "en"=>"Beni Hassan",
                        ],
                        
                ],
            ],//13
           
        ];
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Country::truncate();
        City::truncate();
        foreach ($areas as $area) {
            $ar = City::create([]);
            $ar->translateOrNew('ar')->name = $area['name']['ar'];
            $ar->translateOrNew('en')->name = $area['name']['en'];
            $ar->save();
            foreach($area['cities'] as $city){
                $ci = City::create([
                    'parent_id'=>$ar->id
                ]);
                $ci->translateOrNew('ar')->name = $city['ar'];
                $ci->translateOrNew('en')->name = $city['en'];
                $ci->save();
            }
        }
    }
}
