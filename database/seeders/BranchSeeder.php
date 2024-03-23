<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::updateOrCreate(['en_name' => 'The main branch'], [
            'ar_name' => 'الفرع الرئيسي',
            'ar_address' => 'جدة- حي النخيل – شارع ابو عمرو الاوزاعي',
            'en_address' => 'Jeddah - Al-Nakhil District - Abu Amr Al-Awza’i Street',
            'phone_numbers' => '6293333',
            'mobile_numbers' => '',
            'location' => '21.529036057594976, 39.25036248650797',
        ]);

        Branch::updateOrCreate(['en_name' => 'Kilo 10 branch'], [
            'ar_name' => 'فرع كيلو10',
            'ar_address' => 'طريق مكة القديم',
            'en_address' => 'Old Makkah Road',
            'phone_numbers' => '0122622828',
            'mobile_numbers' => '',
            'location' => '21.45425499805193, 39.2732212018519',
        ]);

        Branch::updateOrCreate(['en_name' => 'Industrial branch'], [
            'ar_name' => 'فرع الصناعية',
            'ar_address' => 'خميس مشيط حي الصناعية الجديدة , طريق وادي بن هشبل مدخل 3.',
            'en_address' => 'Khamis Mushayt, New Industrial District, Wadi Bin Hashbal Road, Entrance 3',
            'phone_numbers' => '0172799996',
            'mobile_numbers' => '0558923414, 0590911125',
            'location' => '18.402416080192456, 42.69765391349203',
        ]);

        Branch::updateOrCreate(['en_name' => 'Benaa City Branch'], [
            'ar_name' => 'فرع مدينة البناء',
            'ar_address' => 'خميس مشيط حي الضيافة , مدينة البناء والعمران , مدخل 5 معرض رقم 154,155',
            'en_address' => 'Khamis Mushayt, Al-Diyafa District, Building and Urban City, Entrance 5, Exhibition No. 154,155',
            'phone_numbers' => '0172227894',
            'mobile_numbers' => '',
            'location' => '18.2967406321161, 42.70343495767198',
        ]);

        Branch::updateOrCreate(['en_name' => 'King Khaled Road Branch'], [
            'ar_name' => 'فرع طريق الملك خالد',
            'ar_address' => 'طريق الملك خالد',
            'en_address' => 'King Khaled Road',
            'phone_numbers' => '0127440333',
            'mobile_numbers' => '0503042619, 0509959389',
            'location' => '21.265286593291908, 40.45776282883599',
        ]);

        Branch::updateOrCreate(['en_name' => 'Southern Shuhada Branch, Street 20'], [
            'ar_name' => 'فرع الشهداء الجنوبية شارع 20',
            'ar_address' => 'الشهداء الجنوبية شارع 20',
            'en_address' => 'Southern Shuhada, Street 20:',
            'phone_numbers' => '0127423410',
            'mobile_numbers' => '0550706961, 0509959389',
            'location' => '21.26532009160521, 40.417276544179934',
        ]);

        Branch::updateOrCreate(['en_name' => 'Qassim branch'], [
            'ar_name' => 'فرع القصيم',
            'ar_address' => 'بريده- حي الخليج- امتداد شارع الشهداء( القناة سابقاً )',
            'en_address' => 'Buraydah - Al-Khaleej District - Extension of Al-Shuhadaa Street (formerly Al-Qanat)',
            'phone_numbers' => '0163232367, 0163235167',
            'mobile_numbers' => '0500038434, 0569237237',
            'location' => '26.297189595508737, 43.976775724891155',
        ]);

        Branch::updateOrCreate(['en_name' => 'Asfan Branch'], [
            'ar_name' => 'فرع عسفان',
            'ar_address' => 'حي الرياض – مخطط الصفوة- طريق عسفان بجوار القاعة الاولى',
            'en_address' => 'Riyadh District - Al Safwa Plan - Asfan Road, next to the First Hall',
            'phone_numbers' => '',
            'mobile_numbers' => '0533324881, 0535329979',
            'location' => '21.85963208516175, 39.22420927116401',
        ]);

        Branch::updateOrCreate(['en_name' => 'Medina Branch'], [
            'ar_name' => 'فرع المدينة المنورة',
            'ar_address' => '',
            'en_address' => 'Old Industrial City - Tabuk Road (Third Ring Road), branching from Old Yanbu Road',
            'phone_numbers' => '0148697692, 0148697693',
            'mobile_numbers' => '0508344678',
            'location' => '24.40324819599326, 39.49858623376084',
        ]);

        Branch::updateOrCreate(['en_name' => 'Riyadh Branch'], [
            'ar_name' => 'فرع الرياض',
            'ar_address' => 'تقاطع شارع ابن ماجه مع شارع ابن العميد',
            'en_address' => 'The intersection of Ibn Majah Street with Ibn Al-Ameed Street',
            'phone_numbers' => '0112111666',
            'mobile_numbers' => '0542665606, 0540520229',
            'location' => '24.64718842606023, 46.86774907388772',
        ]);

        Branch::updateOrCreate(['en_name' => 'Sabya Branch'], [
            'ar_name' => 'فرع صبيا',
            'ar_address' => 'صبيا نخلان شارع الملك عبدالعزيز – منطقة جازان – قطعة رقم 2888',
            'en_address' => 'Sabya Nakhlan King Abdulaziz Street - Jazan Region - Plot No. 2888',
            'phone_numbers' => '0173263333',
            'mobile_numbers' => '0568802918',
            'location' => '17.13498649152564, 42.65267899493888',
        ]);

        Branch::updateOrCreate(['en_name' => 'Sakaka Branch'], [
            'ar_name' => 'فرع سكاكا',
            'ar_address' => 'حي الكرامة – منطقة المستودعات بجوار مستودع بيبسي',
            'en_address' => 'Al Karama District - warehouse area next to the Pepsi warehouse',
            'phone_numbers' => '',
            'mobile_numbers' => '0548468008',
            'location' => '29.989827615272677, 40.241956766680005',
        ]);

        Branch::updateOrCreate(['en_name' => 'Dammam Branch'], [
            'ar_name' => 'فرع الدمام',
            'ar_address' => 'المنطقة الشرقية – الخالدية الشمالية – شارع خلف بن هشام',
            'en_address' => 'Eastern Region - North Khalidiya - Khalaf Bin Hisham Street Opposite SMSA Express Company',
            'phone_numbers' => '0138189685, 0138189686',
            'mobile_numbers' => '0548807338',
            'location' => '26.414133529886385, 50.13593878465604',
        ]);

        Branch::updateOrCreate(['en_name' => 'Hafar Al-Batin Branch'], [
            'ar_name' => 'فرع حفر الباطن',
            'ar_address' => 'حي المصيف – شارع ابو بكر الصديق بجوار قصر السلطان',
            'en_address' => 'Al-Masif neighborhood - Abu Bakr Al-Siddiq Street, next to the Sultan’s Palace',
            'phone_numbers' => '',
            'mobile_numbers' => '0548400482, 0548807340',
            'location' => '28.36331747112201, 46.05196846770632',
        ]);

        Branch::updateOrCreate(['en_name' => 'Tabuk Branch'], [
            'ar_name' => 'فرع تبوك',
            'ar_address' => 'طريق المدينة – مدينة المستودعات – شارع 8 – مستودع رقم (209- 210)',
            'en_address' => 'City Road - Warehouse City - Street 8 - Warehouse No. (209-210)',
            'phone_numbers' => '',
            'mobile_numbers' => '0569239238',
            'location' => '28.48749432312237, 36.60847058330241',
        ]);
    }
}
