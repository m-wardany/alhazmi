<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Info::updateOrCreate([
            'language' => 'ar'
        ], [
            'about' => 'شركة سعودية رائدة، توفر أنواع عالمية ومحلية مبتكرة من الأدوات الصحية، تقدم أفضل الحلول الإنشائية المتميزة وصديقة البيئة، تركز على الجودة والتميز والأسعار التنافسية.
            انطلقت من جدة عام 1996م (1416هـ) لتمتد في جميع مناطق ومدن المملكة عبر 10 فروع تقدم خدماتها على مدار الساعة، تلبي أذواق واحتياجات جميع شرائح المجتمع.',
            'vesion' => 'ترقية الذائقة وتجويد المنتجات وتعزيز الابتكار وتوسيع قاعدة العملاء سعودياً ، وشرق اوسطياً',
            'message' => 'الرهان على الجودة اولاً ، وتحسين جودة الحياة بما يتوافق مع رؤية المملكة 2030 وأن نكون رقم مؤثر في أسواق الطلب والعرض',
            'value_professional' => 'جمال التصميم مع قوة الصناعة',
            'value_innovation' => 'نسبق الخيال بخطوة',
            'value_quality' => 'نلتزم بأفضل المعايير العالمية والمحلية',
            'duty_customer' => 'الالتزام بكافة الوعود بما فيها الجودة ومواعيد التنفيذ وخدمات ما بعد البيع',
            'duty_products' => 'الجودة العالية والذائقة الراقية',
            'duty_markets' => 'المنافسة الشريفة',
            'goals_1_title' => 'الارتقاء بجودة الحياة',
            'goals_1_body' => 'نؤمن أن الارتقاء بجودة الحياة تبدأ من اختيار منتجات انشائية وأدوات صحية مبتكرة، تساعدك على العيش في بيئة صحية مبهجة، تشعرك بالرضا، وتدعم خيالك.',
            'goals_2_title' => 'الأفضل بسعر أنسب',
            'goals_2_body' => 'ليس شرطاً أن يكون الافضل هو الأعلى سعراً، نقدم منتجات فريدة ومبتكرة بأسعار تنافسية تناسب جميع شرائح المجتمع.',
            'goals_3_title' => 'تنوع يلبي الأذواق',
            'goals_3_body' => 'التنوع الكبير في المنتجات والخدمات، يساعدك على أن تختار كل ما يناسبك، ويرضي شغفك.',
            'goals_4_title' => 'خدمة ما بعد البيع',
            'goals_4_body' => 'الحصول على منتجاتنا هو البداية لقائمة خدمات تنتظرك بعد البيع، نضمن لك الصيانة والدعم الفني والحصول على الاستشارات.',
            'goals_5_title' => 'الارتقاء بسوق الانشاءات',
            'goals_5_body' => 'نعمل ضمن منظومة رؤية المملكة 2030، لذا نحرص على الارتقاء بسوق الإنشاءات والأدوات الصحية في المملكة من خلال تطوير علاقتنا مع الشركاء والانفتاح على العالم.',
            'goals_6_title' => 'الالتزام بالأمان والجودة',
            'goals_6_body' => 'لا نتوقف عن ارضاء جميع أذواق عملائنا، بل نحرص على اقتران الجودة بالأمان في كافة المنتجات والخدمات، ونسعى إلى تطوير أساليب العمل لتحقيق ذلك.',
            'goals_7_title' => 'الحفاظ على البيئة والمياه',
            'goals_7_body' => 'نراعي تقليل التأثير البيئي في جميع منتجاتنا وخدماتنا، ونتبنى أساليب وممارسات تؤدي إلى توفير المياه، ونحرص على توعية العاملين بأهمية الحفاظ على البيئة.',
            'goals_8_title' => 'مراعاة المتانة والاستدامة',
            'goals_8_body' => 'تعيش منتجاتنا فترات أطول لأنها أكثر جودة ومتانة، وتقترن الاستدامة باستشراف المستقبل من خلال تقديم أحدث "الموضات" المبتكرة.',
            'team' => 'لدينا فريق عمل من أفضل الكفاءات المتميزة في قطاع الانشاءات وتقديم الحلول في التوصيلات والأدوات الصحية، جاهزين لخدمتك وتلبية احتياجاتك في جميع فروعنا.',
            'responsibilities' => 'بوصلتنا موجهه تجاه المجتمع ، من خلال المشاركة في المشاريع التنموية والتدريبية والتعليمية، والحفاظ على المكتسبات الوطنية، وتوفير الفرص الوظيفية، ونقل خبراتنا لجيل جديد من الشباب الطامح في خدمة وطنه.',
            'integrity' => 'نلتزم بالمعايير الاجتماعية والأخلاقية، وقيم النزاهة والشفافية والاحترام في كافة علاقتنا الاجتماعية والتجارية التي نتعامل فيها.',
            // 'contact_fax' => ['00966126293833', '00966126293833'],
            // 'contact_phone' => ['00966126293333'],
            // 'contact_email' => ['snhazmi@snahco.com'],
        ]);
        Info::updateOrCreate([
            'language' => 'en'
        ], [
            'about' => 'Saud &amp; Nasser Al-Hazmi Company stands as a beacon of innovation in the Saudi market, offering an exclusive selection of both local and international sanitary products. Renowned for our sustainable and superior construction solutions, we prioritize unmatched quality, environmental responsibility, and competitive pricing. Founded in the vibrant city of Jeddah in 1996, our operations have flourished, extending across Saudi Arabia with 10 strategically located branches. Our commitment to excellence ensures 24/7 service availability, meeting the diverse preferences and requirements of our valued clientele.',
            'vesion' => 'We aspire to refine aesthetics in our offerings, enhance the caliber of our products, drive innovation, and broaden our customer base, not just in Saudi Arabia but across the Middle East.',
            'message' => 'We are steadfast in our dedication to quality, aiming to elevate living standards in harmony with the objectives of Saudi Vision 2030 and to establish ourselves as a key influencer in the marketplace.',
            'value_professional' => 'We merge aesthetic elegance with industrial robustness, delivering excellence in every product.',
            'value_innovation' => 'We consistently outpace imagination, pioneering new standards in our industry.',
            'value_quality' => 'Our allegiance to the highest standards is unwavering, whether they are international benchmarks or local norms.',
            'duty_customer' => 'We pledge to honor all our commitments, encompassing the quality of our offerings, punctuality in our deliveries, and the reliability of our after-sales support.',
            'duty_products' => 'We are dedicated to providing products that embody excellence and sophistication.',
            'duty_markets' => 'We uphold the principle of fair competition, ensuring integrity in every transaction.',
            'goals_1_title' => '',
            'goals_1_body' => '',
            'goals_2_title' => '',
            'goals_2_body' => '',
            'goals_3_title' => '',
            'goals_3_body' => '',
            'goals_4_title' => '',
            'goals_4_body' => '',
            'goals_5_title' => '',
            'goals_5_body' => '',
            'goals_6_title' => '',
            'goals_6_body' => '',
            'goals_7_title' => '',
            'goals_7_body' => '',
            'goals_8_title' => '',
            'goals_8_body' => '',
            'team' => 'Our skilled professionals are industry leaders in construction and sanitary solutions, dedicated to providing outstanding service and meeting your needs at all our locations.',
            'responsibilities' => 'Guided by a steadfast commitment to our community, we actively participate in developmental, educational, and training initiatives. We\'re dedicated to preserving national treasures, creating employment opportunities, and sharing our knowledge with the next generation of young professionals eager to contribute to their homeland.',
            'integrity' => 'Our operations are anchored in high social and ethical standards, ensuring integrity, transparency, and respect are at the core of all our social and commercial engagements.',
            // 'contact_fax' => '',
            // 'contact_phone' => '',
            // 'contact_email' => '',
        ]);
    }
}
