<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $nationalities = array(
        //     array('id' => '1','name_ar' => 'سوداني','name_en' => 'Sudanese'),
        //     array('id' => '2','name_ar' => 'مصر','name_en' => 'Egypt'),
        //     array('id' => '3','name_ar' => 'الكويت','name_en' => 'Kuwait'),
        //     array('id' => '4','name_ar' => 'الهند','name_en' => 'India'),
        //     array('id' => '5','name_ar' => 'الفلبين','name_en' => 'Philippines'),
        //     array('id' => '6','name_ar' => 'بنغلاديش','name_en' => 'Bangladesh'),
        //     array('id' => '7','name_ar' => 'السودان','name_en' => 'Sudan'),
        //     array('id' => '8','name_ar' => 'سعودي','name_en' => 'Saudi Arabia'),
        //     array('id' => '9','name_ar' => 'باكستان','name_en' => 'Pakistan'),
        //     array('id' => '10','name_ar' => 'إندونيسيا','name_en' => 'Indonesia'),
        //     array('id' => '11','name_ar' => 'سوريا','name_en' => 'Syrian'),
        //     array('id' => '12','name_ar' => 'اليمن','name_en' => 'Yemen'),
        //     array('id' => '13','name_ar' => 'تركيا','name_en' => 'Turkey'),
        //     array('id' => '14','name_ar' => 'افغانستان','name_en' => 'Afghanistan'),
        //     array('id' => '15','name_ar' => 'الاردن','name_en' => 'Jordan'),
        //     array('id' => '16','name_ar' => 'المغرب','name_en' => 'Morocco'),
        //     array('id' => '17','name_ar' => 'تشاد','name_en' => 'Chad'),
        //     array('id' => '18','name_ar' => 'فلسطين','name_en' => 'Palestine'),
        //     array('id' => '19','name_ar' => 'غانا','name_en' => 'Ghana'),
        //     array('id' => '20','name_ar' => 'كينيا','name_en' => 'Kenya'),
        //     array('id' => '21','name_ar' => 'الصين','name_en' => 'China'),
        //     array('id' => '22','name_ar' => 'تونس','name_en' => 'Tunisia'),
        //     array('id' => '23','name_ar' => 'اثيبوبيا','name_en' => 'Ethiopia'),
        //   );
        $nationalities =[
            [
            'name_ar' => 'أفغانستان',
            'name_en' => 'afghanistan',
            'logo' => 'afghanistan.svg',
            ],
            [
                'name_ar' => 'جزر آلاند',
                'name_en' => 'aland islands',
                'logo' => 'aland-islands.svg',
            ],
            [
                'name_ar' => 'ألبانيا',
                'name_en' => 'albania',
                'logo' => 'albania.svg',
            ],
            [
                'name_ar' => 'الجزائر',
                'name_en' => 'algeria',
                'logo' => 'algeria.svg',
            ],
            [
                'name_ar' => 'ساموا الأمريكية',
                'name_en' => 'american samoa',
                'logo' => 'american-samoa.svg',
            ],
            [
                'name_ar' => 'أندورا',
                'name_en' => 'andorra',
                'logo' => 'andorra.svg',
            ],
            [
                'name_ar' => 'أنغولا',
                'name_en' => 'angola',
                'logo' => 'angola.svg',
            ],
            [
                'name_ar' => 'الأنغيلا',
                'name_en' => 'anguilla',
                'logo' => 'anguilla.svg',
            ],
            [
                'name_ar' => 'أنتيغوا وبربودا',
                'name_en' => 'antigua and barbuda',
                'logo' => 'antigua-and-barbuda.svg',
            ],
            [
                'name_ar' => 'الأرجنتين',
                'name_en' => 'argentina',
                'logo' => 'argentina.svg',
            ],
            [
                'name_ar' => 'أرمينيا',
                'name_en' => 'armenia',
                'logo' => 'armenia.svg',
            ],
            [
                'name_ar' => 'أروبا',
                'name_en' => 'aruba',
                'logo' => 'aruba.svg',
            ],
            [
                'name_ar' => 'أستراليا',
                'name_en' => 'australia',
                'logo' => 'australia.svg',
            ],
            [
                'name_ar' => 'النمسا',
                'name_en' => 'austria',
                'logo' => 'austria.svg',
            ],
            [
                'name_ar' => 'أذربيجان',
                'name_en' => 'azerbaijan',
                'logo' => 'azerbaijan.svg',
            ],
            [
                'name_ar' => 'جزر الأزور',
                'name_en' => 'azores islands',
                'logo' => 'azores-islands.svg',
            ],
            [
                'name_ar' => 'جزر الباهاما',
                'name_en' => 'bahamas',
                'logo' => 'bahamas.svg',
            ],
            [
                'name_ar' => 'البحرين',
                'name_en' => 'bahrain',
                'logo' => 'bahrain.svg',
            ],
            [
                'name_ar' => 'جزر البليار',
                'name_en' => 'balearic islands',
                'logo' => 'balearic-islands.svg',
            ],
            [
                'name_ar' => 'بنجلاديش',
                'name_en' => 'bangladesh',
                'logo' => 'bangladesh.svg',
            ],
            [
                'name_ar' => 'باربادوس',
                'name_en' => 'barbados',
                'logo' => 'barbados.svg',
            ],
            [
                'name_ar' => 'بلد الباسك',
                'name_en' => 'basque country',
                'logo' => 'basque-country.svg',
            ],
            [
                'name_ar' => 'بيلاروسيا',
                'name_en' => 'belarus',
                'logo' => 'belarus.svg',
            ],
            [
                'name_ar' => 'بلجيكا',
                'name_en' => 'belgium',
                'logo' => 'belgium.svg',
            ],
            [
                'name_ar' => 'بليز',
                'name_en' => 'belize',
                'logo' => 'belize.svg',
            ],
            [
                'name_ar' => 'بنين',
                'name_en' => 'benin',
                'logo' => 'benin.svg',
            ],
            [
                'name_ar' => 'برمودا',
                'name_en' => 'bermuda',
                'logo' => 'bermuda.svg',
            ],
            [
                'name_ar' => 'بوتان',
                'name_en' => 'bhutan',
                'logo' => 'bhutan.svg',
            ],
            [
                'name_ar' => 'بوليفيا',
                'name_en' => 'bolivia',
                'logo' => 'bolivia.svg',
            ],
            [
                'name_ar' => 'بونير',
                'name_en' => 'bonaire',
                'logo' => 'bonaire.svg',
            ],
            [
                'name_ar' => 'البوسنة والهرسك',
                'name_en' => 'bosnia and herzegovina',
                'logo' => 'bosnia-and-herzegovina.svg',
            ],
            [
                'name_ar' => 'بوتسوانا',
                'name_en' => 'botswana',
                'logo' => 'botswana.svg',
            ],
            [
                'name_ar' => 'البرازيل',
                'name_en' => 'brazil',
                'logo' => 'brazil.svg',
            ],
            [
                'name_ar' => 'كولومبيا البريطانية',
                'name_en' => 'british columbia',
                'logo' => 'british-columbia.svg',
            ],
            [
                'name_ar' => 'إقليم المحيط البريطاني الهندي',
                'name_en' => 'british indian ocean territory',
                'logo' => 'british-indian-ocean-territory.svg',
            ],
            [
                'name_ar' => 'جزر فيرجن البريطانية',
                'name_en' => 'british virgin islands',
                'logo' => 'british-virgin-islands.svg',
            ],
            [
                'name_ar' => 'بروناي',
                'name_en' => 'brunei',
                'logo' => 'brunei.svg',
            ],
            [
                'name_ar' => 'بلغاريا',
                'name_en' => 'bulgaria',
                'logo' => 'bulgaria.svg',
            ],
            [
                'name_ar' => 'بوركينا فاسو',
                'name_en' => 'burkina faso',
                'logo' => 'burkina-faso.svg',
            ],
            [
                'name_ar' => 'بوروندي',
                'name_en' => 'burundi',
                'logo' => 'burundi.svg',
            ],
            [
                'name_ar' => 'كمبوديا',
                'name_en' => 'cambodia',
                'logo' => 'cambodia.svg',
            ],
            [
                'name_ar' => 'الكاميرون',
                'name_en' => 'cameroon',
                'logo' => 'cameroon.svg',
            ],
            [
                'name_ar' => 'كندا',
                'name_en' => 'canada',
                'logo' => 'canada.svg',
            ],
            [
                'name_ar' => 'جزر الكناري',
                'name_en' => 'canary islands',
                'logo' => 'canary-islands.svg',
            ],
            [
                'name_ar' => 'الرأس الأخضر',
                'name_en' => 'cape verde',
                'logo' => 'cape-verde.svg',
            ],
            [
                'name_ar' => 'جزر كايمان',
                'name_en' => 'cayman islands',
                'logo' => 'cayman-islands.svg',
            ],
            [
                'name_ar' => 'جمهورية افريقيا الوسطى',
                'name_en' => 'central african republic',
                'logo' => 'central-african-republic.svg',
            ],
            [
                'name_ar' => 'سبتة',
                'name_en' => 'ceuta',
                'logo' => 'ceuta.svg',
            ],
            [
                'name_ar' => 'تشاد',
                'name_en' => 'chad',
                'logo' => 'chad.svg',
            ],
            [
                'name_ar' => 'تشيلي',
                'name_en' => 'chile',
                'logo' => 'chile.svg',
            ],
            [
                'name_ar' => 'الصين',
                'name_en' => 'china',
                'logo' => 'china.svg',
            ],
            [
                'name_ar' => 'جزيرة الكريسماس',
                'name_en' => 'christmas island',
                'logo' => 'christmas-island.svg',
            ],
            [
                'name_ar' => 'جزيرة كوكوس',
                'name_en' => 'cocos island',
                'logo' => 'cocos-island.svg',
            ],
            [
                'name_ar' => 'كولومبيا',
                'name_en' => 'colombia',
                'logo' => 'colombia.svg',
            ],
            [
                'name_ar' => 'جزر القمر',
                'name_en' => 'comoros',
                'logo' => 'comoros.svg',
            ],
            [
                'name_ar' => 'جزر كوك',
                'name_en' => 'cook islands',
                'logo' => 'cook-islands.svg',
            ],
            [
                'name_ar' => 'كورسيكا',
                'name_en' => 'corsica',
                'logo' => 'corsica.svg',
            ],
            [
                'name_ar' => 'كوستا ريكا',
                'name_en' => 'costa rica',
                'logo' => 'costa-rica.svg',
            ],
            [
                'name_ar' => 'كرواتيا',
                'name_en' => 'croatia',
                'logo' => 'croatia.svg',
            ],
            [
                'name_ar' => 'كوبا',
                'name_en' => 'cuba',
                'logo' => 'cuba.svg',
            ],
            [
                'name_ar' => 'كوراكاو',
                'name_en' => 'curacao',
                'logo' => 'curacao.svg',
            ],
            [
                'name_ar' => 'الجمهورية التشيكية',
                'name_en' => 'czech republic',
                'logo' => 'czech-republic.svg',
            ],
            [
                'name_ar' => 'جمهورية الكونغو الديمقراطية',
                'name_en' => 'democratic republic of congo',
                'logo' => 'democratic-republic-of-congo.svg',
            ],
            [
                'name_ar' => 'الدنمارك',
                'name_en' => 'denmark',
                'logo' => 'denmark.svg',
            ],
            [
                'name_ar' => 'جيبوتي',
                'name_en' => 'djibouti',
                'logo' => 'djibouti.svg',
            ],
            [
                'name_ar' => 'دومينيكا',
                'name_en' => 'dominica',
                'logo' => 'dominica.svg',
            ],
            [
                'name_ar' => 'جمهورية الدومينيكان',
                'name_en' => 'dominican republic',
                'logo' => 'dominican-republic.svg',
            ],
            [
                'name_ar' => 'تيمور الشرقية',
                'name_en' => 'east timor',
                'logo' => 'east-timor.svg',
            ],
            [
                'name_ar' => 'الاكوادور',
                'name_en' => 'ecuador',
                'logo' => 'ecuador.svg',
            ],
            [
                'name_ar' => 'مصر',
                'name_en' => 'egypt',
                'logo' => 'egypt.svg',
            ],
            [
                'name_ar' => 'السلفادور',
                'name_en' => 'el salvador',
                'logo' => 'el-salvador.svg',
            ],
            [
                'name_ar' => 'إنكلترا',
                'name_en' => 'england',
                'logo' => 'england.svg',
            ],
            [
                'name_ar' => 'غينيا الإستوائية',
                'name_en' => 'equatorial guinea',
                'logo' => 'equatorial-guinea.svg',
            ],
            [
                'name_ar' => 'إريتريا',
                'name_en' => 'eritrea',
                'logo' => 'eritrea.svg',
            ],
            [
                'name_ar' => 'استونيا',
                'name_en' => 'estonia',
                'logo' => 'estonia.svg',
            ],
            [
                'name_ar' => 'أثيوبيا',
                'name_en' => 'ethiopia',
                'logo' => 'ethiopia.svg',
            ],
            [
                'name_ar' => 'الاتحاد الأوروبي',
                'name_en' => 'european union',
                'logo' => 'european-union.svg',
            ],
            [
                'name_ar' => 'جزر فوكلاند',
                'name_en' => 'falkland islands',
                'logo' => 'falkland-islands.svg',
            ],
            [
                'name_ar' => 'فيجي',
                'name_en' => 'fiji',
                'logo' => 'fiji.svg',
            ],
            [
                'name_ar' => 'فنلندا',
                'name_en' => 'finland',
                'logo' => 'finland.svg',
            ],
            [
                'name_ar' => 'علَم',
                'name_en' => 'flag',
                'logo' => 'flag.svg',
            ],
            [
                'name_ar' => 'فرنسا',
                'name_en' => 'france',
                'logo' => 'france.svg',
            ],
            [
                'name_ar' => 'بولينيزيا الفرنسية',
                'name_en' => 'french polynesia',
                'logo' => 'french-polynesia.svg',
            ],
            [
                'name_ar' => 'جابون',
                'name_en' => 'gabon',
                'logo' => 'gabon.svg',
            ],
            [
                'name_ar' => 'جزر غالاباغوس',
                'name_en' => 'galapagos islands',
                'logo' => 'galapagos-islands.svg',
            ],
            [
                'name_ar' => 'غامبيا',
                'name_en' => 'gambia',
                'logo' => 'gambia.svg',
            ],
            [
                'name_ar' => 'جورجيا',
                'name_en' => 'georgia',
                'logo' => 'georgia.svg',
            ],
            [
                'name_ar' => 'ألمانيا',
                'name_en' => 'germany',
                'logo' => 'germany.svg',
            ],
            [
                'name_ar' => 'غانا',
                'name_en' => 'ghana',
                'logo' => 'ghana.svg',
            ],
            [
                'name_ar' => 'جبل طارق',
                'name_en' => 'gibraltar',
                'logo' => 'gibraltar.svg',
            ],
            [
                'name_ar' => 'اليونان',
                'name_en' => 'greece',
                'logo' => 'greece.svg',
            ],
            [
                'name_ar' => 'الأرض الخضراء',
                'name_en' => 'greenland',
                'logo' => 'greenland.svg',
            ],
            [
                'name_ar' => 'غرينادا',
                'name_en' => 'grenada',
                'logo' => 'grenada.svg',
            ],
            [
                'name_ar' => 'غوام',
                'name_en' => 'guam',
                'logo' => 'guam.svg',
            ],
            [
                'name_ar' => 'غواتيمالا',
                'name_en' => 'guatemala',
                'logo' => 'guatemala.svg',
            ],
            [
                'name_ar' => 'غيرنسي',
                'name_en' => 'guernsey',
                'logo' => 'guernsey.svg',
            ],
            [
                'name_ar' => 'غينيا بيساو',
                'name_en' => 'guinea bissau',
                'logo' => 'guinea-bissau.svg',
            ],
            [
                'name_ar' => 'غينيا',
                'name_en' => 'guinea',
                'logo' => 'guinea.svg',
            ],
            [
                'name_ar' => 'هايتي',
                'name_en' => 'haiti',
                'logo' => 'haiti.svg',
            ],
            [
                'name_ar' => 'هاواي',
                'name_en' => 'hawaii',
                'logo' => 'hawaii.svg',
            ],
            [
                'name_ar' => 'هندوراس',
                'name_en' => 'honduras',
                'logo' => 'honduras.svg',
            ],
            [
                'name_ar' => 'هونغ كونغ',
                'name_en' => 'hong kong',
                'logo' => 'hong-kong.svg',
            ],
            [
                'name_ar' => 'هنغاريا',
                'name_en' => 'hungary',
                'logo' => 'hungary.svg',
            ],
            [
                'name_ar' => 'أيسلندا',
                'name_en' => 'iceland',
                'logo' => 'iceland.svg',
            ],
            [
                'name_ar' => 'الهند',
                'name_en' => 'india',
                'logo' => 'india.svg',
            ],
            [
                'name_ar' => 'إندونيسيا',
                'name_en' => 'indonesia',
                'logo' => 'indonesia.svg',
            ],
            [
                'name_ar' => 'إيران',
                'name_en' => 'iran',
                'logo' => 'iran.svg',
            ],
            [
                'name_ar' => 'العراق',
                'name_en' => 'iraq',
                'logo' => 'iraq.svg',
            ],
            [
                'name_ar' => 'ايرلندا',
                'name_en' => 'ireland',
                'logo' => 'ireland.svg',
            ],
            [
                'name_ar' => 'جزيرة آيل أوف مان',
                'name_en' => 'isle of man',
                'logo' => 'isle-of-man.svg',
            ],
            [
                'name_ar' => 'إسرائيل',
                'name_en' => 'israel',
                'logo' => 'israel.svg',
            ],
            [
                'name_ar' => 'إيطاليا',
                'name_en' => 'italy',
                'logo' => 'italy.svg',
            ],
            [
                'name_ar' => 'ساحل العاج',
                'name_en' => 'ivory coast',
                'logo' => 'ivory-coast.svg',
            ],
            [
                'name_ar' => 'جامايكا',
                'name_en' => 'jamaica',
                'logo' => 'jamaica.svg',
            ],
            [
                'name_ar' => 'اليابان',
                'name_en' => 'japan',
                'logo' => 'japan.svg',
            ],
            [
                'name_ar' => 'جيرسي',
                'name_en' => 'jersey',
                'logo' => 'jersey.svg',
            ],
            [
                'name_ar' => 'الأردن',
                'name_en' => 'jordan',
                'logo' => 'jordan.svg',
            ],
            [
                'name_ar' => 'كازاخستان',
                'name_en' => 'kazakhstan',
                'logo' => 'kazakhstan.svg',
            ],
            [
                'name_ar' => 'كينيا',
                'name_en' => 'kenya',
                'logo' => 'kenya.svg',
            ],
            [
                'name_ar' => 'كيريباتي',
                'name_en' => 'kiribati',
                'logo' => 'kiribati.svg',
            ],
            [
                'name_ar' => 'كوسوفو',
                'name_en' => 'kosovo',
                'logo' => 'kosovo.svg',
            ],
            [
                'name_ar' => 'الكويت',
                'name_en' => 'kuwait',
                'logo' => 'kuwait.svg',
            ],
            [
                'name_ar' => 'قيرغيزستان',
                'name_en' => 'kyrgyzstan',
                'logo' => 'kyrgyzstan.svg',
            ],
            [
                'name_ar' => 'لاوس',
                'name_en' => 'laos',
                'logo' => 'laos.svg',
            ],
            [
                'name_ar' => 'لاتفيا',
                'name_en' => 'latvia',
                'logo' => 'latvia.svg',
            ],
            [
                'name_ar' => 'لبنان',
                'name_en' => 'lebanon',
                'logo' => 'lebanon.svg',
            ],
            [
                'name_ar' => 'ليسوتو',
                'name_en' => 'lesotho',
                'logo' => 'lesotho.svg',
            ],
            [
                'name_ar' => 'ليبيريا',
                'name_en' => 'liberia',
                'logo' => 'liberia.svg',
            ],
            [
                'name_ar' => 'ليبيا',
                'name_en' => 'libya',
                'logo' => 'libya.svg',
            ],
            [
                'name_ar' => 'ليختنشتاين',
                'name_en' => 'liechtenstein',
                'logo' => 'liechtenstein.svg',
            ],
            [
                'name_ar' => 'ليتوانيا',
                'name_en' => 'lithuania',
                'logo' => 'lithuania.svg',
            ],
            [
                'name_ar' => 'لوكسمبورغ',
                'name_en' => 'luxembourg',
                'logo' => 'luxembourg.svg',
            ],
            [
                'name_ar' => 'ماكاو',
                'name_en' => 'macao',
                'logo' => 'macao.svg',
            ],
            [
                'name_ar' => 'مدغشقر',
                'name_en' => 'madagascar',
                'logo' => 'madagascar.svg',
            ],
            [
                'name_ar' => 'الماديرا',
                'name_en' => 'madeira',
                'logo' => 'madeira.svg',
            ],
            [
                'name_ar' => 'ملاوي',
                'name_en' => 'malawi',
                'logo' => 'malawi.svg',
            ],
            [
                'name_ar' => 'ماليزيا',
                'name_en' => 'malaysia',
                'logo' => 'malaysia.svg',
            ],
            [
                'name_ar' => 'جزر المالديف',
                'name_en' => 'maldives',
                'logo' => 'maldives.svg',
            ],
            [
                'name_ar' => 'مالي',
                'name_en' => 'mali',
                'logo' => 'mali.svg',
            ],
            [
                'name_ar' => 'مالطا',
                'name_en' => 'malta',
                'logo' => 'malta.svg',
            ],
            [
                'name_ar' => 'جزيرة مارشال',
                'name_en' => 'marshall island',
                'logo' => 'marshall-island.svg',
            ],
            [
                'name_ar' => 'مارتينيك',
                'name_en' => 'martinique',
                'logo' => 'martinique.svg',
            ],
            [
                'name_ar' => 'موريتانيا',
                'name_en' => 'mauritania',
                'logo' => 'mauritania.svg',
            ],
            [
                'name_ar' => 'موريشيوس',
                'name_en' => 'mauritius',
                'logo' => 'mauritius.svg',
            ],
            [
                'name_ar' => 'مليلية',
                'name_en' => 'melilla',
                'logo' => 'melilla.svg',
            ],
            [
                'name_ar' => 'المكسيك',
                'name_en' => 'mexico',
                'logo' => 'mexico.svg',
            ],
            [
                'name_ar' => 'ميكرونيزيا',
                'name_en' => 'micronesia',
                'logo' => 'micronesia.svg',
            ],
            [
                'name_ar' => 'مولدوفا',
                'name_en' => 'moldova',
                'logo' => 'moldova.svg',
            ],
            [
                'name_ar' => 'موناكو',
                'name_en' => 'monaco',
                'logo' => 'monaco.svg',
            ],
            [
                'name_ar' => 'منغوليا',
                'name_en' => 'mongolia',
                'logo' => 'mongolia.svg',
            ],
            [
                'name_ar' => 'الجبل الأسود',
                'name_en' => 'montenegro',
                'logo' => 'montenegro.svg',
            ],
            [
                'name_ar' => 'مونتسيرات',
                'name_en' => 'montserrat',
                'logo' => 'montserrat.svg',
            ],
            [
                'name_ar' => 'المغرب',
                'name_en' => 'morocco',
                'logo' => 'morocco.svg',
            ],
            [
                'name_ar' => 'موزمبيق',
                'name_en' => 'mozambique',
                'logo' => 'mozambique.svg',
            ],
            [
                'name_ar' => 'ميانمار',
                'name_en' => 'myanmar',
                'logo' => 'myanmar.svg',
            ],
            [
                'name_ar' => 'ناميبيا',
                'name_en' => 'namibia',
                'logo' => 'namibia.svg',
            ],
            [
                'name_ar' => 'حلف الناتو',
                'name_en' => 'nato',
                'logo' => 'nato.svg',
            ],
            [
                'name_ar' => 'ناورو',
                'name_en' => 'nauru',
                'logo' => 'nauru.svg',
            ],
            [
                'name_ar' => 'نيبال',
                'name_en' => 'nepal',
                'logo' => 'nepal.svg',
            ],
            [
                'name_ar' => 'هولندا',
                'name_en' => 'netherlands',
                'logo' => 'netherlands.svg',
            ],
            [
                'name_ar' => 'نيوزيلندا',
                'name_en' => 'new zealand',
                'logo' => 'new-zealand.svg',
            ],
            [
                'name_ar' => 'نيكاراغوا',
                'name_en' => 'nicaragua',
                'logo' => 'nicaragua.svg',
            ],
            [
                'name_ar' => 'النيجر',
                'name_en' => 'niger',
                'logo' => 'niger.svg',
            ],
            [
                'name_ar' => 'نيجيريا',
                'name_en' => 'nigeria',
                'logo' => 'nigeria.svg',
            ],
            [
                'name_ar' => 'نيو',
                'name_en' => 'niue',
                'logo' => 'niue.svg',
            ],
            [
                'name_ar' => 'جزيرة نورفولك',
                'name_en' => 'norfolk island',
                'logo' => 'norfolk-island.svg',
            ],
            [
                'name_ar' => 'كوريا الشمالية',
                'name_en' => 'north korea',
                'logo' => 'north-korea.svg',
            ],
            [
                'name_ar' => 'شمال قبرص',
                'name_en' => 'northern cyprus',
                'logo' => 'northern-cyprus.svg',
            ],
            [
                'name_ar' => 'جزر مريانا الشمالية',
                'name_en' => 'northern mariana islands',
                'logo' => 'northern-mariana-islands.svg',
            ],
            [
                'name_ar' => 'النرويج',
                'name_en' => 'norway',
                'logo' => 'norway.svg',
            ],
            [
                'name_ar' => 'سلطنة عمان',
                'name_en' => 'oman',
                'logo' => 'oman.svg',
            ],
            [
                'name_ar' => 'أوسيتيا',
                'name_en' => 'ossetia',
                'logo' => 'ossetia.svg',
            ],
            [
                'name_ar' => 'باكستان',
                'name_en' => 'pakistan',
                'logo' => 'pakistan.svg',
            ],
            [
                'name_ar' => 'بالاو',
                'name_en' => 'palau',
                'logo' => 'palau.svg',
            ],
            [
                'name_ar' => 'فلسطين',
                'name_en' => 'palestine',
                'logo' => 'palestine.svg',
            ],
            [
                'name_ar' => 'بنما',
                'name_en' => 'panama',
                'logo' => 'panama.svg',
            ],
            [
                'name_ar' => 'بابوا غينيا الجديدة',
                'name_en' => 'papua new guinea',
                'logo' => 'papua-new-guinea.svg',
            ],
            [
                'name_ar' => 'باراغواي',
                'name_en' => 'paraguay',
                'logo' => 'paraguay.svg',
            ],
            [
                'name_ar' => 'بيرو',
                'name_en' => 'peru',
                'logo' => 'peru.svg',
            ],
            [
                'name_ar' => 'فيلبيني',
                'name_en' => 'philippines',
                'logo' => 'philippines.svg',
            ],
            [
                'name_ar' => 'جزر بيتكيرن',
                'name_en' => 'pitcairn islands',
                'logo' => 'pitcairn-islands.svg',
            ],
            [
                'name_ar' => 'بولندا',
                'name_en' => 'poland',
                'logo' => 'poland.svg',
            ],
            [
                'name_ar' => 'البرتغال',
                'name_en' => 'portugal',
                'logo' => 'portugal.svg',
            ],
            [
                'name_ar' => 'بورتوريكو',
                'name_en' => 'puerto rico',
                'logo' => 'puerto-rico.svg',
            ],
            [
                'name_ar' => 'دولة قطر',
                'name_en' => 'qatar',
                'logo' => 'qatar.svg',
            ],
            [
                'name_ar' => 'رابا نوي',
                'name_en' => 'rapa nui',
                'logo' => 'rapa-nui.svg',
            ],
            [
                'name_ar' => 'جمهورية مقدونيا',
                'name_en' => 'republic of macedonia',
                'logo' => 'republic-of-macedonia.svg',
            ],
            [
                'name_ar' => 'جمهورية الكونغو',
                'name_en' => 'republic of the congo',
                'logo' => 'republic-of-the-congo.svg',
            ],
            [
                'name_ar' => 'رومانيا',
                'name_en' => 'romania',
                'logo' => 'romania.svg',
            ],
            [
                'name_ar' => 'روسيا',
                'name_en' => 'russia',
                'logo' => 'russia.svg',
            ],
            [
                'name_ar' => 'رواندا',
                'name_en' => 'rwanda',
                'logo' => 'rwanda.svg',
            ],
            [
                'name_ar' => 'جزيرة سابا',
                'name_en' => 'saba island',
                'logo' => 'saba-island.svg',
            ],
            [
                'name_ar' => 'الجمهورية العربية الصحراوية الديمقراطية',
                'name_en' => 'sahrawi arab democratic republic',
                'logo' => 'sahrawi-arab-democratic-republic.svg',
            ],
            [
                'name_ar' => 'سانت كيتس ونيفيس',
                'name_en' => 'saint kitts and nevis',
                'logo' => 'saint-kitts-and-nevis.svg',
            ],
            [
                'name_ar' => 'ساموا',
                'name_en' => 'samoa',
                'logo' => 'samoa.svg',
            ],
            [
                'name_ar' => 'سان مارينو',
                'name_en' => 'san marino',
                'logo' => 'san-marino.svg',
            ],
            [
                'name_ar' => 'ساو تومي والأمير',
                'name_en' => 'sao tome and prince',
                'logo' => 'sao-tome-and-prince.svg',
            ],
            [
                'name_ar' => 'سردينيا',
                'name_en' => 'sardinia',
                'logo' => 'sardinia.svg',
            ],
            [
                'name_ar' => 'المملكة العربية السعودية',
                'name_en' => 'saudi arabia',
                'logo' => 'saudi-arabia.svg',
            ],
            [
                'name_ar' => 'اسكتلندا',
                'name_en' => 'scotland',
                'logo' => 'scotland.svg',
            ],
            [
                'name_ar' => 'السنغال',
                'name_en' => 'senegal',
                'logo' => 'senegal.svg',
            ],
            [
                'name_ar' => 'صربيا',
                'name_en' => 'serbia',
                'logo' => 'serbia.svg',
            ],
            [
                'name_ar' => 'سيشل',
                'name_en' => 'seychelles',
                'logo' => 'seychelles.svg',
            ],
            [
                'name_ar' => 'صقلية',
                'name_en' => 'sicily',
                'logo' => 'sicily.svg',
            ],
            [
                'name_ar' => 'سيرا ليون',
                'name_en' => 'sierra leone',
                'logo' => 'sierra-leone.svg',
            ],
            [
                'name_ar' => 'سنغافورة',
                'name_en' => 'singapore',
                'logo' => 'singapore.svg',
            ],
            [
                'name_ar' => 'سينت أوستاتيوس',
                'name_en' => 'sint eustatius',
                'logo' => 'sint-eustatius.svg',
            ],
            [
                'name_ar' => 'سينت مارتن',
                'name_en' => 'sint maarten',
                'logo' => 'sint-maarten.svg',
            ],
            [
                'name_ar' => 'سلوفاكيا',
                'name_en' => 'slovakia',
                'logo' => 'slovakia.svg',
            ],
            [
                'name_ar' => 'سلوفينيا',
                'name_en' => 'slovenia',
                'logo' => 'slovenia.svg',
            ],
            [
                'name_ar' => 'جزر سليمان',
                'name_en' => 'solomon islands',
                'logo' => 'solomon-islands.svg',
            ],
            [
                'name_ar' => 'الصومال',
                'name_en' => 'somalia',
                'logo' => 'somalia.svg',
            ],
            [
                'name_ar' => 'صوماليلاند',
                'name_en' => 'somaliland',
                'logo' => 'somaliland.svg',
            ],
            [
                'name_ar' => 'جنوب أفريقيا',
                'name_en' => 'south africa',
                'logo' => 'south-africa.svg',
            ],
            [
                'name_ar' => 'كوريا الجنوبية',
                'name_en' => 'south korea',
                'logo' => 'south-korea.svg',
            ],
            [
                'name_ar' => 'جنوب السودان',
                'name_en' => 'south sudan',
                'logo' => 'south-sudan.svg',
            ],
            [
                'name_ar' => 'إسبانيا',
                'name_en' => 'spain',
                'logo' => 'spain.svg',
            ],
            [
                'name_ar' => 'سيريلانكا',
                'name_en' => 'sri lanka',
                'logo' => 'sri-lanka.svg',
            ],
            [
                'name_ar' => 'سانت بارتس',
                'name_en' => 'st barts',
                'logo' => 'st-barts.svg',
            ],
            [
                'name_ar' => 'شارع لوسيا',
                'name_en' => 'st lucia',
                'logo' => 'st-lucia.svg',
            ],
            [
                'name_ar' => 'سانت فنسنت وجزر غرينادين',
                'name_en' => 'st vincent and the grenadines',
                'logo' => 'st-vincent-and-the-grenadines.svg',
            ],
            [
                'name_ar' => 'السودان',
                'name_en' => 'sudan',
                'logo' => 'sudan.svg',
            ],
            [
                'name_ar' => 'سورينام',
                'name_en' => 'suriname',
                'logo' => 'suriname.svg',
            ],
            [
                'name_ar' => 'سوازيلاند',
                'name_en' => 'swaziland',
                'logo' => 'swaziland.svg',
            ],
            [
                'name_ar' => 'السويد',
                'name_en' => 'sweden',
                'logo' => 'sweden.svg',
            ],
            [
                'name_ar' => 'سويسرا',
                'name_en' => 'switzerland',
                'logo' => 'switzerland.svg',
            ],
            [
                'name_ar' => 'سوريا',
                'name_en' => 'syria',
                'logo' => 'syria.svg',
            ],
            [
                'name_ar' => 'تايوان',
                'name_en' => 'taiwan',
                'logo' => 'taiwan.svg',
            ],
            [
                'name_ar' => 'طاجيكستان',
                'name_en' => 'tajikistan',
                'logo' => 'tajikistan.svg',
            ],
            [
                'name_ar' => 'تنزانيا',
                'name_en' => 'tanzania',
                'logo' => 'tanzania.svg',
            ],
            [
                'name_ar' => 'تايلاند',
                'name_en' => 'thailand',
                'logo' => 'thailand.svg',
            ],
            [
                'name_ar' => 'التبت',
                'name_en' => 'tibet',
                'logo' => 'tibet.svg',
            ],
            [
                'name_ar' => 'توجو',
                'name_en' => 'togo',
                'logo' => 'togo.svg',
            ],
            [
                'name_ar' => 'توكيلاو',
                'name_en' => 'tokelau',
                'logo' => 'tokelau.svg',
            ],
            [
                'name_ar' => 'تونجا',
                'name_en' => 'tonga',
                'logo' => 'tonga.svg',
            ],
            [
                'name_ar' => 'ترانسنيستريا',
                'name_en' => 'transnistria',
                'logo' => 'transnistria.svg',
            ],
            [
                'name_ar' => 'ترينداد وتوباغو',
                'name_en' => 'trinidad and tobago',
                'logo' => 'trinidad-and-tobago.svg',
            ],
            [
                'name_ar' => 'تونس',
                'name_en' => 'tunisia',
                'logo' => 'tunisia.svg',
            ],
            [
                'name_ar' => 'ديك رومى',
                'name_en' => 'turkey',
                'logo' => 'turkey.svg',
            ],
            [
                'name_ar' => 'تركمانستان',
                'name_en' => 'turkmenistan',
                'logo' => 'turkmenistan.svg',
            ],
            [
                'name_ar' => 'تركيا وكايكوس',
                'name_en' => 'turks and caicos',
                'logo' => 'turks-and-caicos.svg',
            ],
            [
                'name_ar' => 'توفالو',
                'name_en' => 'tuvalu',
                'logo' => 'tuvalu.svg',
            ],
            [
                'name_ar' => 'أوغندا',
                'name_en' => 'uganda',
                'logo' => 'uganda.svg',
            ],
            [
                'name_ar' => 'المملكة المتحدة',
                'name_en' => 'uk',
                'logo' => 'uk.svg',
            ],
            [
                'name_ar' => 'اوكرانيا',
                'name_en' => 'ukraine',
                'logo' => 'ukraine.svg',
            ],
            [
                'name_ar' => 'الإمارات العربية المتحدة',
                'name_en' => 'united arab emirates',
                'logo' => 'united-arab-emirates.svg',
            ],
            [
                'name_ar' => 'الأمم المتحدة',
                'name_en' => 'united nations',
                'logo' => 'united-nations.svg',
            ],
            [
                'name_ar' => 'الولايات المتحدة',
                'name_en' => 'united states',
                'logo' => 'united-states.svg',
            ],
            [
                'name_ar' => 'أوروغواي',
                'name_en' => 'uruguay',
                'logo' => 'uruguay.svg',
            ],
            [
                'name_ar' => 'اوزبكستان',
                'name_en' => 'uzbekistan',
                'logo' => 'uzbekistan.svg',
            ],
            [
                'name_ar' => 'فانواتو',
                'name_en' => 'vanuatu',
                'logo' => 'vanuatu.svg',
            ],
            [
                'name_ar' => 'مدينة الفاتيكان',
                'name_en' => 'vatican city',
                'logo' => 'vatican-city.svg',
            ],
            [
                'name_ar' => 'فنزويلا',
                'name_en' => 'venezuela',
                'logo' => 'venezuela.svg',
            ],
            [
                'name_ar' => 'فيتنام',
                'name_en' => 'vietnam',
                'logo' => 'vietnam.svg',
            ],
            [
                'name_ar' => 'جزر العذراء',
                'name_en' => 'virgin islands',
                'logo' => 'virgin-islands.svg',
            ],
            [
                'name_ar' => 'ويلز',
                'name_en' => 'wales',
                'logo' => 'wales.svg',
            ],
            [
                'name_ar' => 'اليمن',
                'name_en' => 'yemen',
                'logo' => 'yemen.svg',
            ],
            [
                'name_ar' => 'زامبيا',
                'name_en' => 'zambia',
                'logo' => 'zambia.svg',
            ],
            [
                'name_ar' => 'زيمبابوي',
                'name_en' => 'zimbabwe',
                'logo' => 'zimbabwe.svg',
            ],
        ];
          
        Nationality::insert($nationalities);
    }
}
