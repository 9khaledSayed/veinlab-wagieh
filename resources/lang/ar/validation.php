<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'يجب قبول ( :attribute )',
    'active_url'           => '( :attribute ) لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على ( :attribute ) أن يكون تاريخًا لاحقًا للتاريخ :date',
    'after_or_equal'       => '( :attribute ) يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date',
    'alpha'                => 'يجب أن لا يحتوي ( :attribute ) سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي ( :attribute ) سوى على حروف، أرقام ومطّات',
    'alpha_num'            => 'يجب أن يحتوي ( :attribute ) على حروف وأرقامٍ فقط ولا يحتوي علي مسافات',
    'array'                => 'يجب أن يكون ( :attribute ) ًمصفوفة',
    'before'               => 'يجب على ( :attribute ) أن يكون تاريخًا سابقًا للتاريخ :date',
    'before_or_equal'      => '( :attribute ) يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) بين :min و :max',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) بين :min و :max كيلوبايت',
        'string'  => 'يجب أن يكون عدد حروف النّص ( :attribute ) بين :min و :max',
        'array'   => 'يجب أن يحتوي ( :attribute ) على عدد من العناصر بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة ( :attribute ) إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل ( :attribute )',
    'date'                 => '( :attribute ) ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق ( :attribute ) مع الشكل :format',
    'different'            => 'يجب أن يكون الحقلان ( :attribute ) و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي ( :attribute ) على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي ( :attribute ) بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'الـ ( :attribute ) يحتوي على أبعاد صورة غير صالحة',
    'distinct'             => 'للحقل ( :attribute ) قيمة مُكرّرة',
    'email'                => 'يجب أن يكون ( :attribute ) عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'القيمة المحددة ( :attribute ) غير موجودة',
    'file'                 => 'الـ ( :attribute ) يجب أن يكون ملفا',
    'filled'               => '( :attribute ) إجباري',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) أكبر من :value',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص ( :attribute ) أكثر من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على أكثر من :value عناصر/عنصر',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أكبر من :value',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) على الأقل :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النص ( :attribute ) على الأقل :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على الأقل على :value عُنصرًا/عناصر',
    ],
    'image'                => 'يجب أن يكون ( :attribute ) صورةً',
    'in'                   => '( :attribute ) غير موجود',
    'in_array'             => '( :attribute ) غير موجود في :other',
    'integer'              => 'يجب أن يكون ( :attribute ) عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون ( :attribute ) عنوان IP صحيحًا',
    'ipv4'                 => 'يجب أن يكون ( :attribute ) عنوان IPv4 صحيحًا',
    'ipv6'                 => 'يجب أن يكون ( :attribute ) عنوان IPv6 صحيحًا',
    'json'                 => 'يجب أن يكون ( :attribute ) نصآ من نوع JSON',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) أصغر من :value',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) أصغر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص ( :attribute ) أقل من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على أقل من :value عناصر/عنصر',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أصغر من :value',
        'file'    => 'يجب أن لا يتجاوز حجم الملف ( :attribute ) :value كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص ( :attribute ) :value حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي ( :attribute ) على أكثر من :value عناصر/عنصر',
    ],
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أصغر من :max',
        'file'    => 'يجب أن لا يتجاوز حجم الملف ( :attribute ) :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص ( :attribute ) :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي ( :attribute ) على أكثر من :max عناصر/عنصر',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أكبر من :min',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) على الأقل :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص ( :attribute ) على الأقل :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي ( :attribute ) على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => '( :attribute ) موجود',
    'not_regex'            => 'صيغة ( :attribute ) غير صحيحة',
    'numeric'              => 'يجب على ( :attribute ) أن يكون رقمًا',
    'present'              => 'يجب تقديم ( :attribute )',
    'regex'                => 'صيغة ( :attribute ) .غير صحيحة',
    'required'             => 'حقل ( :attribute ) مطلوب',
    'required_if'          => '( :attribute ) مطلوب في حال ما إذا كان :other يساوي :value',
    'required_unless'      => '( :attribute ) مطلوب في حال ما لم يكن :other يساوي :values',
    'required_with'        => '( :attribute ) مطلوب إذا كان :values',
    'required_with_all'    => '( :attribute ) مطلوب إذا كان :values',
    'required_without'     => '( :attribute ) مطلوب إذا لم يكن :values',
    'required_without_all' => '( :attribute ) مطلوب إذا لم يكن :values',
    'same'                 => 'يجب أن يتطابق ( :attribute ) مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية لـ :size',
        'file'    => 'يجب أن يكون حجم الملف ( :attribute ) :size كيلوبايت',
        'string'  => 'يجب أن يحتوي النص ( :attribute ) على :size حروفٍ/حرفًا بالضبط',
        'array'   => 'يجب أن يحتوي ( :attribute ) على :size عنصرٍ/عناصر بالضبط',
    ],
    'string'               => 'يجب أن يكون ( :attribute ) نصآ',
    'timezone'             => 'يجب أن يكون ( :attribute ) نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة ( :attribute ) مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ ( :attribute )',
    'url'                  => 'صيغة الرابط ( :attribute ) غير صحيحة',
    'uuid'                 => '( :attribute ) يجب أن يكون بصيغة UUID سليمة',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [

        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'abilities' => [
            'required' => 'صلاحيات الوظيفة مطلوبة'
        ]

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */


    'attributes' => [
        'email' => 'البريد الإلكتروني',
        'phone' => 'الهاتف',
        'name_en' => 'الإسم باللغة الإنجليزية',
        'name_ar' => 'الاسم باللغة العربية',
        'password' =>'كلمة المرور',
        'password_confirmation' =>'تأكيد كلمة المرور',
        'phone_number' =>'رقم الهاتف',
        'image' => 'الصورة' ,
        'lat' => 'العنوان من الخريطة',
        'year' => 'العام',
        'price' => 'السعر',
        'discount_price' => 'السعر بعد التخفيض',
        'tax' => 'الضريبة',
        'status' => 'الحالة',
        'name' => 'الاسم',
        'address' => 'العنوان',
        'title' => 'العنوان',
        'description' => 'الوصف',
        'whatsapp' => 'واتسآب',
        'roles' => 'الصلاحيات والأدوار',
        'website_name_ar' => 'اسم الموقع بالعربية',
        'website_name_en' => 'اسم الموقع بالانجليزية',
        'facebook_url' => 'رابط فيسبوك',
        'twitter_url' => 'رابط تويتر',
        'instagram_url' => 'رابط انستجرام',
        'youtube_url' => 'رابط قناة اليوتيوب',
        'snapchat_url' => 'رابط سناب شات',
        'logo' => 'اللوجو',
        'favicon' => 'أيقونة الموقع',
        'setting_type' => 'نوع الإعدادات',
        'meta_tag_description_ar' => 'وصف مختصر بالعربية',
        'meta_tag_description_en' => 'وصف مختصر بالانجليزية',
        'meta_tag_keyword_ar' => 'كلمات دلالية بالعربية',
        'meta_tag_keyword_en' => 'كلمات دلالية بالانجليزية',
        'privacy_policy_ar' => 'سياسة الخصوصية بالعربية',
        'privacy_policy_en' => 'سياسة الخصوصية بالانجليزية',
        'first_name' => 'الاسم الأول',
        'last_name' => 'الاسم الأخير',
        'message' => 'الرسالة',
        'have_discount' => 'يوجد تخفيض',
        'frame' => 'الفريم',
        'id_number' => 'رقم الهوية',
        'gender' => 'الجنس',
        'nationality_id' => 'الجنسية',
        'age' => 'العمر',
        'diseases' => 'الأمراض المزمنة',
        'blood_type' => 'فصيلة الدم',
        'weight' => 'الوزن',
        'height' => 'الطول',
        'date_time' => 'الوقت و التاريخ',
        'percentage' => 'النسبة المئوية',
        'marketer_id' => 'بيانات المسوق',
        'amount' => 'القيمة',
        'type' => 'النوع',
        'main_analysis' => 'التحاليل الرئيسي',
        'insurance_company_categories' => 'فئات شركات التأمين',
        'general_name' => 'الاسم العام',
        'abbreviated_name' => 'الاسم المختصر',
        'code' => 'الكود',
        'discount' => 'الخصم',
        'cost' => 'التكلفة',
        'price_insurance' => 'قيمة التامين',
        'price_hospital' => 'سعر المستشفى',
        'sub_analysis' => 'التحاليل الفرعية',
        'country' => 'الدولة',
        'belong_to' => 'ينتمي إلى',
        'bank_account_title' => 'عنوان الحساب المصرفي',
        'bank_name' => 'اسم البنك',
        'swift_code' => 'كود سويفت',
        'bank_account_no' => 'رقم الحساب البنكي',
        'bank_branch_code' => 'رمز فرع البنك',
        'main_analysis_id' => 'التحليل الاساسي',
        'discount_type' => 'نوع الخصم',
        'ranges' => 'يتراوح',
        'sub_type' => 'النوع الفرعي',
        'user_earning_type' => 'نوع أرباح المستخدم',
        'user_earning' => 'أرباح المستخدم',
        'num_points' => 'عدد النقاط',
        'eq_value' => 'قيمة مكافئ',
        'range' => 'الفترة',
        'company_name_ar' => 'اسم الشركة عربي',
        'company_name_en' => 'اسم الشركة انجليزي',
        'commercial_number' => 'الرقم التجاري',
        'ceo' => 'المدير التنفيذي',
        'hr_manager' => 'مدير الموارد البشرية',
        'country_ar' => 'البلد عربي',
        'country_en' => 'البلد انجليزي',
        'city_ar' => 'المدينة عربي',
        'city_en' => 'المدينة انجليزي',
        'address_ar' => 'العنوان عربي',
        'address_en' => 'العنوان انجليزي',
        'postal_code' => 'الرقم البريدي',
        'company_stamp_image' => 'صورة ختم الشركة',
        'ceo_signature_image' => 'صورة توقيع الرئيس التنفيذي',
        'header_image' => 'صورة البداية',
        'footer_image' => 'صورة النهاية',
        'working_hours' => 'تاريخ العمل',
        'grace_period_for_delay' => 'فترة سماح للتأخير',
        'salary_issuance_date' => 'salary_issuance_date',
        'home_visit_fees' => 'رسوم الزيارة المنزلية',
        'tax_number' => 'الرقم الضريبي',
        'includes' => 'يشمل',
        'main_analysis.*.id' => 'التحليل',
        'sub_analysis.*.classification' => 'التصنيف',
        'sub_analysis.*.unit' => 'الوحدة',
        'sub_analysis.*.name' => 'اسم التحليل الفرعي',
        'sub_analysis.*.normal_range.*.from' => 'من',
        'sub_analysis.*.normal_range.*.to' => 'الي',
        'sub_analysis.*.normal_range.*.gender' => 'الجنس',
        'sub_analysis.*.normal_range.*.type' => 'النوع',
        'sub_analysis.*.normal_range.*.value' => 'المعدل الطبيعي',
        'today' => 'اليوم',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
    ],

    'values' => [
        'from' => [
            'today' => 'اليوم',
        ],
        'use_type' => [
            'date' => 'تاريخ',
            'count' => 'عدد محدد من المستخدمين',
            'both' => 'عدد محدد من المستخدمين و تاريخ'
        ],
        'end_at' => [
            'today' => 'اليوم'
        ],

        'setting_type' => [
            'about-website' => 'عن الموقع',
            'general' => 'عام',
            'website' => 'الموقع'
        ],
        'date' => [
            'today' => 'اليوم'
        ],


    ]
];
