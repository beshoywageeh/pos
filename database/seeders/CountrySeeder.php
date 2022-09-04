<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        $countries = [
            ['ar' => '15 مايو', 'en' => '15 May'],
            ['ar' => 'الازبكية', 'en' => 'Al Azbakeyah'],
            ['ar' => 'البساتين', 'en' => 'Al Basatin'],
            ['ar' => 'التبين', 'en' => 'Tebin'],
            ['ar' => 'الخليفة', 'en' => 'El-Khalifa'],
            ['ar' => 'الدراسة', 'en' => 'El darrasa'],
            ['ar' => 'الدرب الاحمر', 'en' => 'Aldarb Alahmar'],
            ['ar' => 'الزاوية الحمراء', 'en' => 'Zawya al-Hamra'],
            ['ar' => 'الزيتون', 'en' => 'El-Zaytoun'],
            ['ar' => 'الساحل', 'en' => 'Sahel'],
            ['ar' => 'السلام', 'en' => 'El Salam'],
            ['ar' => 'السيدة زينب', 'en' => 'Sayeda Zeinab'],
            ['ar' => 'الشرابية', 'en' => 'El Sharabeya'],
            ['ar' => 'مدينة الشروق', 'en' => 'Shorouk'],
            ['ar' => 'الظاهر', 'en' => 'El Daher'],
            ['ar' => 'العتبة', 'en' => 'Ataba'],
            ['ar' => 'القاهرة الجديدة', 'en' => 'New Cairo'],
            ['ar' => 'المرج', 'en' => 'El Marg'],
            ['ar' => 'عزبة النخل', 'en' => 'Ezbet el Nakhl'],
            ['ar' => 'المطرية', 'en' => 'Matareya'],
            ['ar' => 'المعادى', 'en' => 'Maadi'],
            ['ar' => 'المعصرة', 'en' => 'Maasara'],
            ['ar' => 'المقطم', 'en' => 'Mokattam'],
            ['ar' => 'المنيل', 'en' => 'Manyal'],
            ['ar' => 'الموسكى', 'en' => 'Mosky'],
            ['ar' => 'النزهة', 'en' => 'Nozha'],
            ['ar' => 'الوايلى', 'en' => 'Waily'],
            ['ar' => 'باب الشعرية', 'en' => 'Bab al-Shereia'],
            ['ar' => 'بولاق', 'en' => 'Bolaq'],
            ['ar' => 'جاردن سيتى', 'en' => 'Garden City'],
            ['ar' => 'حدائق القبة', 'en' => 'Hadayek El-Kobba'],
            ['ar' => 'حلوان', 'en' => 'Helwan'],
            ['ar' => 'دار السلام', 'en' => 'Dar Al Salam'],
            ['ar' => 'شبرا', 'en' => 'Shubra'],
            ['ar' => 'طره', 'en' => 'Tura'],
            ['ar' => 'عابدين', 'en' => 'Abdeen'],
            ['ar' => 'عباسية', 'en' => 'Abaseya'],
            ['ar' => 'عين شمس', 'en' => 'Ain Shams'],
            ['ar' => 'مدينة نصر', 'en' => 'Nasr City'],
            ['ar' => 'مصر الجديدة', 'en' => 'New Heliopolis'],
            ['ar' => 'مصر القديمة', 'en' => 'Masr Al Qadima'],
            ['ar' => 'منشية ناصر', 'en' => 'Mansheya Nasir'],
            ['ar' => 'مدينة بدر', 'en' => 'Badr City'],
            ['ar' => 'مدينة العبور', 'en' => 'Obour City'],
            ['ar' => 'وسط البلد', 'en' => 'Cairo Downtown'],
            ['ar' => 'الزمالك', 'en' => 'Zamalek'],
            ['ar' => 'قصر النيل', 'en' => 'Kasr El Nile'],
            ['ar' => 'الرحاب', 'en' => 'Rehab'],
            ['ar' => 'القطامية', 'en' => 'Katameya'],
            ['ar' => 'مدينتي', 'en' => 'Madinty'],
            ['ar' => 'روض الفرج', 'en' => 'Rod Alfarag'],
            ['ar' => 'شيراتون', 'en' => 'Sheraton'],
            ['ar' => 'الجمالية', 'en' => 'El-Gamaleya'],
            ['ar' => 'العاشر من رمضان', 'en' => '10th of Ramadan City'],
            ['ar' => 'الحلمية', 'en' => 'Helmeyat Alzaytoun'],
            ['ar' => 'النزهة الجديدة', 'en' => 'New Nozha'],
            ['ar' => 'العاصمة الإدارية', 'en' => 'Capital New'],
            ['ar' => 'الجيزة', 'en' => 'Giza'],
            ['ar' => 'السادس من أكتوبر', 'en' => 'Sixth of October'],
            ['ar' => 'الشيخ زايد', 'en' => 'Cheikh Zayed'],
            ['ar' => 'الحوامدية', 'en' => 'Hawamdiyah'],
            ['ar' => 'البدرشين', 'en' => 'Al Badrasheen'],
            ['ar' => 'الصف', 'en' => 'Saf'],
            ['ar' => 'أطفيح', 'en' => 'Atfih'],
            ['ar' => 'العياط', 'en' => 'Al Ayat'],
            ['ar' => 'الباويطي', 'en' => 'Al-Bawaiti'],
            ['ar' => 'منشأة القناطر', 'en' => 'ManshiyetAl Qanater'],
            ['ar' => 'أوسيم', 'en' => 'Oaseem'],
            ['ar' => 'كرداسة', 'en' => 'Kerdasa'],
            ['ar' => 'أبو النمرس', 'en' => 'Abu Nomros'],
            ['ar' => 'كفر غطاطي', 'en' => 'Kafr Ghati'],
            ['ar' => 'منشأة البكاري', 'en' => 'Manshiyet Al Bakari'],
            ['ar' => 'الدقى', 'en' => 'Dokki'],
            ['ar' => 'العجوزة', 'en' => 'Agouza'],
            ['ar' => 'الهرم', 'en' => 'Haram'],
            ['ar' => 'الوراق', 'en' => 'Warraq'],
            ['ar' => 'امبابة', 'en' => 'Imbaba'],
            ['ar' => 'بولاق الدكرور', 'en' => 'Boulaq Dakrour'],
            ['ar' => 'الواحات البحرية', 'en' => 'Al Wahat Al Baharia'],
            ['ar' => 'العمرانية', 'en' => 'Omraneya'],
            ['ar' => 'المنيب', 'en' => 'Moneeb'],
            ['ar' => 'بين السرايات', 'en' => 'Bin Alsarayat'],
            ['ar' => 'الكيت كات', 'en' => 'Kit Kat'],
            ['ar' => 'المهندسين', 'en' => 'Mohandessin'],
            ['ar' => 'فيصل', 'en' => 'Faisal'],
            ['ar' => 'أبو رواش', 'en' => 'Abu Rawash'],
            ['ar' => 'حدائق الأهرام', 'en' => 'Hadayek Alahram'],
            ['ar' => 'الحرانية', 'en' => 'Haraneya'],
            ['ar' => 'حدائق اكتوبر', 'en' => 'Hadayek October'],
            ['ar' => 'صفط اللبن', 'en' => 'Saft Allaban'],
            ['ar' => 'القرية الذكية', 'en' => 'Smart Village'],
            ['ar' => 'ارض اللواء', 'en' => 'Ard Ellwaa'],
            ['ar' => 'ابو قير', 'en' => 'Abu Qir'],
            ['ar' => 'الابراهيمية', 'en' => 'Al Ibrahimeyah'],
            ['ar' => 'الأزاريطة', 'en' => 'Azarita'],
            ['ar' => 'الانفوشى', 'en' => 'Anfoushi'],
            ['ar' => 'الدخيلة', 'en' => 'Dekheila'],
            ['ar' => 'السيوف', 'en' => 'El Soyof'],
            ['ar' => 'العامرية', 'en' => 'Ameria'],
            ['ar' => 'اللبان', 'en' => 'El Labban'],
            ['ar' => 'المفروزة', 'en' => 'Al Mafrouza'],
            ['ar' => 'المنتزه', 'en' => 'El Montaza'],
            ['ar' => 'المنشية', 'en' => 'Mansheya'],
            ['ar' => 'الناصرية', 'en' => 'Naseria'],
            ['ar' => 'امبروزو', 'en' => 'Ambrozo'],
            ['ar' => 'باب شرق', 'en' => 'Bab Sharq'],
            ['ar' => 'برج العرب', 'en' => 'Bourj Alarab'],
            ['ar' => 'ستانلى', 'en' => 'Stanley'],
            ['ar' => 'سموحة', 'en' => 'Smouha'],
            ['ar' => 'سيدى بشر', 'en' => 'Sidi Bishr'],
            ['ar' => 'شدس', 'en' => 'Shads'],
            ['ar' => 'غيط العنب', 'en' => 'Gheet Alenab'],
            ['ar' => 'فلمينج', 'en' => 'Fleming'],
            ['ar' => 'فيكتوريا', 'en' => 'Victoria'],
            ['ar' => 'كامب شيزار', 'en' => 'Camp Shizar'],
            ['ar' => 'كرموز', 'en' => 'Karmooz'],
            ['ar' => 'محطة الرمل', 'en' => 'Mahta Alraml'],
            ['ar' => 'مينا البصل', 'en' => 'Mina El-Basal'],
            ['ar' => 'العصافرة', 'en' => 'Asafra'],
            ['ar' => 'العجمي', 'en' => 'Agamy'],
            ['ar' => 'بكوس', 'en' => 'Bakos'],
            ['ar' => 'بولكلي', 'en' => 'Boulkly'],
            ['ar' => 'كليوباترا', 'en' => 'Cleopatra'],
            ['ar' => 'جليم', 'en' => 'Glim'],
            ['ar' => 'المعمورة', 'en' => 'Al Mamurah'],
            ['ar' => 'المندرة', 'en' => 'Al Mandara'],
            ['ar' => 'محرم بك', 'en' => 'Moharam Bek'],
            ['ar' => 'الشاطبي', 'en' => 'Elshatby'],
            ['ar' => 'سيدي جابر', 'en' => 'Sidi Gaber'],
            ['ar' => 'الساحل الشمالي', 'en' => "North Coast\/sahel"],
            ['ar' => 'الحضرة', 'en' => 'Alhadra'],
            ['ar' => 'العطارين', 'en' => 'Alattarin'],
            ['ar' => 'سيدي كرير', 'en' => 'Sidi Kerir'],
            ['ar' => 'الجمرك', 'en' => 'Elgomrok'],
            ['ar' => 'المكس', 'en' => 'Al Max'],
            ['ar' => 'مارينا', 'en' => 'Marina'],
            ['ar' => 'المنصورة', 'en' => 'Mansoura'],
            ['ar' => 'طلخا', 'en' => 'Talkha'],
            ['ar' => 'ميت غمر', 'en' => 'Mitt Ghamr'],
            ['ar' => 'دكرنس', 'en' => 'Dekernes'],
            ['ar' => 'أجا', 'en' => 'Aga'],
            ['ar' => 'منية النصر', 'en' => 'Menia El Nasr'],
            ['ar' => 'السنبلاوين', 'en' => 'Sinbillawin'],
            ['ar' => 'الكردي', 'en' => 'El Kurdi'],
            ['ar' => 'بني عبيد', 'en' => 'Bani Ubaid'],
            ['ar' => 'المنزلة', 'en' => 'Al Manzala'],
            ['ar' => 'تمي الأمديد', 'en' => "tami al'amdid"],
            ['ar' => 'الجمالية', 'en' => 'aljamalia'],
            ['ar' => 'شربين', 'en' => 'Sherbin'],
            ['ar' => 'المطرية', 'en' => 'Mataria'],
            ['ar' => 'بلقاس', 'en' => 'Belqas'],
            ['ar' => 'ميت سلسيل', 'en' => 'Meet Salsil'],
            ['ar' => 'جمصة', 'en' => 'Gamasa'],
            ['ar' => 'محلة دمنة', 'en' => 'Mahalat Damana'],
            ['ar' => 'نبروه', 'en' => 'Nabroh'],
            ['ar' => 'الغردقة', 'en' => 'Hurghada'],
            ['ar' => 'رأس غارب', 'en' => 'Ras Ghareb'],
            ['ar' => 'سفاجا', 'en' => 'Safaga'],
            ['ar' => 'القصير', 'en' => 'El Qusiar'],
            ['ar' => 'مرسى علم', 'en' => 'Marsa Alam'],
            ['ar' => 'الشلاتين', 'en' => 'Shalatin'],
            ['ar' => 'حلايب', 'en' => 'Halaib'],
            ['ar' => 'الدهار', 'en' => 'Aldahar'],
            ['ar' => 'دمنهور', 'en' => 'Damanhour'],
            ['ar' => 'كفر الدوار', 'en' => 'Kafr El Dawar'],
            ['ar' => 'رشيد', 'en' => 'Rashid'],
            ['ar' => 'إدكو', 'en' => 'Edco'],
            ['ar' => 'أبو المطامير', 'en' => 'Abu al-Matamir'],
            ['ar' => 'أبو حمص', 'en' => 'Abu Homs'],
            ['ar' => 'الدلنجات', 'en' => 'Delengat'],
            ['ar' => 'المحمودية', 'en' => 'Mahmoudiyah'],
            ['ar' => 'الرحمانية', 'en' => 'Rahmaniyah'],
            ['ar' => 'إيتاي البارود', 'en' => 'Itai Baroud'],
            ['ar' => 'حوش عيسى', 'en' => 'Housh Eissa'],
            ['ar' => 'شبراخيت', 'en' => 'Shubrakhit'],
            ['ar' => 'كوم حمادة', 'en' => 'Kom Hamada'],
            ['ar' => 'بدر', 'en' => 'Badr'],
            ['ar' => 'وادي النطرون', 'en' => 'Wadi Natrun'],
            ['ar' => 'النوبارية الجديدة', 'en' => 'New Nubaria'],
            ['ar' => 'النوبارية', 'en' => 'Alnoubareya'],
            ['ar' => 'الفيوم', 'en' => 'Fayoum'],
            ['ar' => 'الفيوم الجديدة', 'en' => 'Fayoum El Gedida'],
            ['ar' => 'طامية', 'en' => 'Tamiya'],
            ['ar' => 'سنورس', 'en' => 'Snores'],
            ['ar' => 'إطسا', 'en' => 'Etsa'],
            ['ar' => 'إبشواي', 'en' => 'Epschway'],
            ['ar' => 'يوسف الصديق', 'en' => 'Yusuf El Sediaq'],
            ['ar' => 'الحادقة', 'en' => 'Hadqa'],
            ['ar' => 'اطسا', 'en' => 'Atsa'],
            ['ar' => 'الجامعة', 'en' => 'Algamaa'],
            ['ar' => 'السيالة', 'en' => 'Sayala'],
            ['ar' => 'طنطا', 'en' => 'Tanta'],
            ['ar' => 'المحلة الكبرى', 'en' => 'Al Mahalla Al Kobra'],
            ['ar' => 'كفر الزيات', 'en' => 'Kafr El Zayat'],
            ['ar' => 'زفتى', 'en' => 'Zefta'],
            ['ar' => 'السنطة', 'en' => 'El Santa'],
            ['ar' => 'قطور', 'en' => 'Qutour'],
            ['ar' => 'بسيون', 'en' => 'Basion'],
            ['ar' => 'سمنود', 'en' => 'Samannoud'],
            ['ar' => 'الإسماعيلية', 'en' => 'Ismailia'],
            ['ar' => 'فايد', 'en' => 'Fayed'],
            ['ar' => 'القنطرة شرق', 'en' => 'Qantara Sharq'],
            ['ar' => 'القنطرة غرب', 'en' => 'Qantara Gharb'],
            ['ar' => 'التل الكبير', 'en' => 'El Tal El Kabier'],
            ['ar' => 'أبو صوير', 'en' => 'Abu Sawir'],
            ['ar' => 'القصاصين الجديدة', 'en' => 'Kasasien El Gedida'],
            ['ar' => 'نفيشة', 'en' => 'Nefesha'],
            ['ar' => 'الشيخ زايد', 'en' => 'Sheikh Zayed'],
            [ 'ar' => 'شبين الكوم', 'en' => 'Shbeen El Koom'],
            [ 'ar' => 'مدينة السادات', 'en' => 'Sadat City'],
            [ 'ar' => 'منوف', 'en' => 'Menouf'],
            [ 'ar' => 'سرس الليان', 'en' => 'Sars El-Layan'],
            [ 'ar' => 'أشمون', 'en' => 'Ashmon'],
            [ 'ar' => 'الباجور', 'en' => 'Al Bagor'],
            [ 'ar' => 'قويسنا', 'en' => 'Quesna'],
            [ 'ar' => 'بركة السبع', 'en' => 'Berkat El Saba'],
            [ 'ar' => 'تلا', 'en' => 'Tala'],
            [ 'ar' => 'الشهداء', 'en' => 'Al Shohada'],
            [ 'ar' => 'المنيا', 'en' => 'Minya'],
            [ 'ar' => 'المنيا الجديدة', 'en' => 'Minya El Gedida'],
            [ 'ar' => 'العدوة', 'en' => 'El Adwa'],
            [ 'ar' => 'مغاغة', 'en' => 'Magagha'],
            [ 'ar' => 'بني مزار', 'en' => 'Bani Mazar'],
            [ 'ar' => 'مطاي', 'en' => 'Mattay'],
            [ 'ar' => 'سمالوط', 'en' => 'Samalut'],
            [ 'ar' => 'المدينة الفكرية', 'en' => 'Madinat El Fekria'],
            [ 'ar' => 'ملوي', 'en' => 'Meloy'],
            [ 'ar' => 'دير مواس', 'en' => 'Deir Mawas'],
            [ 'ar' => 'ابو قرقاص', 'en' => 'Abu Qurqas'],
            [ 'ar' => 'ارض سلطان', 'en' => 'Ard Sultan'],
            [ 'ar' => 'بنها', 'en' => 'Banha'],
            [ 'ar' => 'قليوب', 'en' => 'Qalyub'],
            [ 'ar' => 'شبرا الخيمة', 'en' => 'Shubra Al Khaimah'],
            [ 'ar' => 'القناطر الخيرية', 'en' => 'Al Qanater Charity'],
            [ 'ar' => 'الخانكة', 'en' => 'Khanka'],
            [ 'ar' => 'كفر شكر', 'en' => 'Kafr Shukr'],
            [ 'ar' => 'طوخ', 'en' => 'Tukh'],
            [ 'ar' => 'قها', 'en' => 'Qaha'],
            [ 'ar' => 'العبور', 'en' => 'Obour'],
            [ 'ar' => 'الخصوص', 'en' => 'Khosous'],
            [ 'ar' => 'شبين القناطر', 'en' => 'Shibin Al Qanater'],
            [ 'ar' => 'مسطرد', 'en' => 'Mostorod'],
            [ 'ar' => 'الخارجة', 'en' => 'El Kharga'],
            [ 'ar' => 'باريس', 'en' => 'Paris'],
            [ 'ar' => 'موط', 'en' => 'Mout'],
            [ 'ar' => 'الفرافرة', 'en' => 'Farafra'],
            [ 'ar' => 'بلاط', 'en' => 'Balat'],
            [ 'ar' => 'الداخلة', 'en' => 'Dakhla'],
            [ 'ar' => 'السويس', 'en' => 'Suez'],
            [ 'ar' => 'الجناين', 'en' => 'Alganayen'],
            [ 'ar' => 'عتاقة', 'en' => 'Ataqah'],
            [ 'ar' => 'العين السخنة', 'en' => 'Ain Sokhna'],
            [ 'ar' => 'فيصل', 'en' => 'Faysal'],
            [ 'ar' => 'أسوان', 'en' => 'Aswan'],
            [ 'ar' => 'أسوان الجديدة', 'en' => 'Aswan El Gedida'],
            [ 'ar' => 'دراو', 'en' => 'Drau'],
            [ 'ar' => 'كوم أمبو', 'en' => 'Kom Ombo'],
            [ 'ar' => 'نصر النوبة', 'en' => 'Nasr Al Nuba'],
            [ 'ar' => 'كلابشة', 'en' => 'Kalabsha'],
            [ 'ar' => 'إدفو', 'en' => 'Edfu'],
            [ 'ar' => 'الرديسية', 'en' => 'Al-Radisiyah'],
            [ 'ar' => 'البصيلية', 'en' => 'Al Basilia'],
            [ 'ar' => 'السباعية', 'en' => 'Al Sibaeia'],
            [ 'ar' => 'ابوسمبل السياحية', 'en' => 'Abo Simbl Al Siyahia'],
            [ 'ar' => 'مرسى علم', 'en' => 'Marsa Alam'],
            [ 'ar' => 'أسيوط', 'en' => 'Assiut'],
            [ 'ar' => 'أسيوط الجديدة', 'en' => 'Assiut El Gedida'],
            [ 'ar' => 'ديروط', 'en' => 'Dayrout'],
            [ 'ar' => 'منفلوط', 'en' => 'Manfalut'],
            [ 'ar' => 'القوصية', 'en' => 'Qusiya'],
            [ 'ar' => 'أبنوب', 'en' => 'Abnoub'],
            [ 'ar' => 'أبو تيج', 'en' => 'Abu Tig'],
            [ 'ar' => 'الغنايم', 'en' => 'El Ghanaim'],
            [ 'ar' => 'ساحل سليم', 'en' => 'Sahel Selim'],
            [ 'ar' => 'البداري', 'en' => 'El Badari'],
            [ 'ar' => 'صدفا', 'en' => 'Sidfa'],
            [ 'ar' => 'بني سويف', 'en' => 'Bani Sweif'],
            [ 'ar' => 'بني سويف الجديدة', 'en' => 'Beni Suef El Gedida'],
            [ 'ar' => 'الواسطى', 'en' => 'Al Wasta'],
            [ 'ar' => 'ناصر', 'en' => 'Naser'],
            [ 'ar' => 'إهناسيا', 'en' => 'Ehnasia'],
            [ 'ar' => 'ببا', 'en' => 'beba'],
            [ 'ar' => 'الفشن', 'en' => 'Fashn'],
            [ 'ar' => 'سمسطا', 'en' => 'Somasta'],
            [ 'ar' => 'الاباصيرى', 'en' => 'Alabbaseri'],
            [ 'ar' => 'مقبل', 'en' => 'Mokbel'],
            [ 'ar' => 'بورسعيد', 'en' => 'PorSaid'],
            [ 'ar' => 'بورفؤاد', 'en' => 'Port Fouad'],
            [ 'ar' => 'العرب', 'en' => 'Alarab'],
            [ 'ar' => 'حى الزهور', 'en' => 'Zohour'],
            [ 'ar' => 'حى الشرق', 'en' => 'Alsharq'],
            [ 'ar' => 'حى الضواحى', 'en' => 'Aldawahi'],
            [ 'ar' => 'حى المناخ', 'en' => 'Almanakh'],
            [ 'ar' => 'حى مبارك', 'en' => 'Mubarak'],
            [ 'ar' => 'دمياط', 'en' => 'Damietta'],
            [ 'ar' => 'دمياط الجديدة', 'en' => 'New Damietta'],
            [ 'ar' => 'رأس البر', 'en' => 'Ras El Bar'],
            [ 'ar' => 'فارسكور', 'en' => 'Faraskour'],
            [ 'ar' => 'الزرقا', 'en' => 'Zarqa'],
            [ 'ar' => 'السرو', 'en' => 'alsaru'],
            [ 'ar' => 'الروضة', 'en' => 'alruwda'],
            [ 'ar' => 'كفر البطيخ', 'en' => 'Kafr El-Batikh'],
            [ 'ar' => 'عزبة البرج', 'en' => 'Azbet Al Burg'],
            [ 'ar' => 'ميت أبو غالب', 'en' => 'Meet Abou Ghalib'],
            [ 'ar' => 'كفر سعد', 'en' => 'Kafr Saad'],
            [ 'ar' => 'الزقازيق', 'en' => 'Zagazig'],
            [ 'ar' => 'العاشر من رمضان', 'en' => 'Al Ashr Men Ramadan'],
            [ 'ar' => 'منيا القمح', 'en' => 'Minya Al Qamh'],
            [ 'ar' => 'بلبيس', 'en' => 'Belbeis'],
            [ 'ar' => 'مشتول السوق', 'en' => 'Mashtoul El Souq'],
            [ 'ar' => 'القنايات', 'en' => 'Qenaiat'],
            [ 'ar' => 'أبو حماد', 'en' => 'Abu Hammad'],
            [ 'ar' => 'القرين', 'en' => 'El Qurain'],
            [ 'ar' => 'ههيا', 'en' => 'Hehia'],
            [ 'ar' => 'أبو كبير', 'en' => 'Abu Kabir'],
            [ 'ar' => 'فاقوس', 'en' => 'Faccus'],
            [ 'ar' => 'الصالحية الجديدة', 'en' => 'El Salihia El Gedida'],
            [ 'ar' => 'الإبراهيمية', 'en' => 'Al Ibrahimiyah'],
            [ 'ar' => 'ديرب نجم', 'en' => 'Deirb Negm'],
            [ 'ar' => 'كفر صقر', 'en' => 'Kafr Saqr'],
            [ 'ar' => 'أولاد صقر', 'en' => 'Awlad Saqr'],
            [ 'ar' => 'الحسينية', 'en' => 'Husseiniya'],
            [ 'ar' => 'صان الحجر القبلية', 'en' => 'san alhajar alqablia'],
            [ 'ar' => 'منشأة أبو عمر', 'en' => 'Manshayat Abu Omar'],
            [ 'ar' => 'الطور', 'en' => 'Al Toor'],
            [ 'ar' => 'شرم الشيخ', 'en' => 'Sharm El-Shaikh'],
            [ 'ar' => 'دهب', 'en' => 'Dahab'],
            [ 'ar' => 'نويبع', 'en' => 'Nuweiba'],
            [ 'ar' => 'طابا', 'en' => 'Taba'],
            [ 'ar' => 'سانت كاترين', 'en' => 'Saint Catherine'],
            [ 'ar' => 'أبو رديس', 'en' => 'Abu Redis'],
            [ 'ar' => 'أبو زنيمة', 'en' => 'Abu Zenaima'],
            [ 'ar' => 'رأس سدر', 'en' => 'Ras Sidr'],
            [ 'ar' => 'كفر الشيخ', 'en' => 'Kafr El Sheikh'],
            [ 'ar' => 'وسط البلد كفر الشيخ', 'en' => 'Kafr El Sheikh Downtown'],
            [ 'ar' => 'دسوق', 'en' => 'Desouq'],
            [ 'ar' => 'فوه', 'en' => 'Fooh'],
            [ 'ar' => 'مطوبس', 'en' => 'Metobas'],
            [ 'ar' => 'برج البرلس', 'en' => 'Burg Al Burullus'],
            [ 'ar' => 'بلطيم', 'en' => 'Baltim'],
            [ 'ar' => 'مصيف بلطيم', 'en' => 'Masief Baltim'],
            [ 'ar' => 'الحامول', 'en' => 'Hamol'],
            [ 'ar' => 'بيلا', 'en' => 'Bella'],
            [ 'ar' => 'الرياض', 'en' => 'Riyadh'],
            [ 'ar' => 'سيدي سالم', 'en' => 'Sidi Salm'],
            [ 'ar' => 'قلين', 'en' => 'Qellen'],
            [ 'ar' => 'سيدي غازي', 'en' => 'Sidi Ghazi'],
            [ 'ar' => 'مرسى مطروح', 'en' => 'Marsa Matrouh'],
            [ 'ar' => 'الحمام', 'en' => 'El Hamam'],
            [ 'ar' => 'العلمين', 'en' => 'Alamein'],
            [ 'ar' => 'الضبعة', 'en' => 'Dabaa'],
            [ 'ar' => 'النجيلة', 'en' => 'Al-Nagila'],
            [ 'ar' => 'سيدي براني', 'en' => 'Sidi Brani'],
            [ 'ar' => 'السلوم', 'en' => 'Salloum'],
            [ 'ar' => 'سيوة', 'en' => 'Siwa'],
            [ 'ar' => 'مارينا', 'en' => 'Marina'],
            [ 'ar' => 'الساحل الشمالى', 'en' => 'North Coast'],
            [ 'ar' => 'الأقصر', 'en' => 'Luxor'],
            [ 'ar' => 'الأقصر الجديدة', 'en' => 'New Luxor'],
            [ 'ar' => 'إسنا', 'en' => 'Esna'],
            [ 'ar' => 'طيبة الجديدة', 'en' => 'New Tiba'],
            [ 'ar' => 'الزينية', 'en' => 'Al ziynia'],
            [ 'ar' => 'البياضية', 'en' => 'Al Bayadieh'],
            [ 'ar' => 'القرنة', 'en' => 'Al Qarna'],
            [ 'ar' => 'أرمنت', 'en' => 'Armant'],
            [ 'ar' => 'الطود', 'en' => 'Al Tud'],
            [ 'ar' => 'قنا', 'en' => 'Qena'],
            [ 'ar' => 'قنا الجديدة', 'en' => 'New Qena'],
            [ 'ar' => 'ابو طشت', 'en' => 'Abu Tesht'],
            [ 'ar' => 'نجع حمادي', 'en' => 'Nag Hammadi'],
            [ 'ar' => 'دشنا', 'en' => 'Deshna'],
            [ 'ar' => 'الوقف', 'en' => 'Alwaqf'],
            [ 'ar' => 'قفط', 'en' => 'Qaft'],
            [ 'ar' => 'نقادة', 'en' => 'Naqada'],
            [ 'ar' => 'فرشوط', 'en' => 'Farshout'],
            [ 'ar' => 'قوص', 'en' => 'Quos'],
            [ 'ar' => 'العريش', 'en' => 'Arish'],
            [ 'ar' => 'الشيخ زويد', 'en' => 'Sheikh Zowaid'],
            [ 'ar' => 'نخل', 'en' => 'Nakhl'],
            [ 'ar' => 'رفح', 'en' => 'Rafah'],
            [ 'ar' => 'بئر العبد', 'en' => 'Bir al-Abed'],
            [ 'ar' => 'الحسنة', 'en' => 'Al Hasana'],
            [ 'ar' => 'سوهاج', 'en' => 'Sohag'],
            [ 'ar' => 'سوهاج الجديدة', 'en' => 'Sohag El Gedida'],
            [ 'ar' => 'أخميم', 'en' => 'Akhmeem'],
            [ 'ar' => 'أخميم الجديدة', 'en' => 'Akhmim El Gedida'],
            [ 'ar' => 'البلينا', 'en' => 'Albalina'],
            [ 'ar' => 'المراغة', 'en' => 'El Maragha'],
            [ 'ar' => 'المنشأة', 'en' => "almunsha'a"],
            [ 'ar' => 'دار السلام', 'en' => 'Dar AISalaam'],
            [ 'ar' => 'جرجا', 'en' => 'Gerga'],
            [ 'ar' => 'جهينة الغربية', 'en' => 'Jahina Al Gharbia'],
            [ 'ar' => 'ساقلته', 'en' => 'Saqilatuh'],
            [ 'ar' => 'طما', 'en' => 'Tama'],
            [ 'ar' => 'طهطا', 'en' => 'Tahta'],
            [ 'ar' => 'الكوثر', 'en' => 'Alkawthar'],
        ];
        foreach($countries as $country){
            Country::create(['name'=>$country]);
        }
    }
}