<?php

return array(

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

    "accepted"         => ":attribute باید پذیرفته شود.",
    "active_url"       => "آدرس :attribute معتبر نیست.",
    "after"            => ":attribute باید یک تاریخ بعد از :date باشد.",
    "alpha"            => ":attribute ممکن است تنها شامل حروف باشد..",
    "alpha_dash"       => ":attribute ممکن است تنها شامل حروف، اعداد، و خط تیره باشد.",
    "alpha_num"        => ":attribute ممکن است تنها شامل حروف و اعداد باشد.",
    "array"            => ":attribute باید یک آرایه باشد.",
    "before"           => ":attribute باید یک تاریخ قبل از :date باشد.",
    "between"          => array(
        "numeric" => "عدد attribute باید بین :min و :max باشد.",
        "file"    => "فایل :attribute باید بین :min و :max کیلو بایت باشد.",
        "string"  => "رشته :attribute باید بین :min و :max کاراکتر  باشد.",
        "array"   => "آرایه :attribute باید :min و :max آیتم داشته باشد.",
    ),
    "confirmed"        => ":attribute تاییدیه مطابقت ندارد.",
    "date"             => "تاریخ :attribute معتبر نیست.",
    "date_format"      => "قالب تاریخ :attribute با قالب :format مطابقت ندارد.",
    "different"        => ":attribute و :other باید متفاوت باشد.",
    "digits"           => " :attribute  باید عددی و  :digits رقمی باشد.",
    "digits_between"   => "شماره :attribute باید بیم ارقام :min و :max باشد.",
    "email"            => "قالب ایمیل  :attribute نامعتبر است.",
    "exists"           => "مقدار انتخاب شده  :attribute نا معتبر می باشد.",
    "image"            => ":attribute باید یک  تصویر باشد. ",
    "in"               => "مقدار انتخاب شده  :attribute نا معتبر می باشد.",
    "integer"          => "مقدار :attribute باید عدد صحیص باشد.",
    "ip"               => "آی پی :attribute باید یک آدرس آی پی معتبر باشد.",
    "max"              => array(
        "numeric" => "عدد :attribute احتمالا بزرگتر از  :max می باشد.",
        "file"    => "فایل :attribute احتمالا بیشتر از :max  کیلوبایت می باشد.",
        "string"  => "رشته :attribute احتمالا بیشتر از :max کارکتر می باشد.",
        "array"   => "آرایه :attribute احتمالا بیشتر از :max آیتم می باشد.",
    ),
    "mimes"            => "فایل :attributeباید یک فایل از نوع : :values باشد.",
    "min"              => array(
        "numeric" => "عدد :attribute باید حداقل :min باشد.",
        "file"    => "فایل :attribute باید حداقل :min کیلوبایت باشد.",
        "string"  => ":attribute باید حداقل  :min کاراکتر داشته باشد.",
        "array"   => "آرایه :attribute باید حداقل :min آیتم داشته باشد.",
    ),
    "not_in"           => "مقدار :attribute نامعتبر است",
    "numeric"          => "مقدار :attribute باید عددی باشد.",
    "regex"            => "قالب :attribute نامعتبر می باشد.",
    "required"         => "وارد کردن :attribute اجباری است.",
    "required_if"      => "این :attribute زمانی لازم است که:other باشد :value.",
    "required_with"    => "این :attribute زمانی لازم است که :values موجود باشد.",
    "required_without" => "این :attribute زمانی لازم است که :values موجود نباشد.",
    "same"             => "مقدار :attribute و :other باید باهم یکسان باشد.",
    "size"             => array(
        "numeric" => "عدد :attribute باید اندازه  :size باشد.",
        "file"    => "فایل :attribute باید اندازه :size  کیلوبایت باشد.",
        "string"  => "رشته :attribute باید اندازه :size characters.",
        "array"   => "آرایه :attribute باید شامل :size آیتم باشد.",
    ),
    "unique"           => "مقدار :attribute قبلا استفاده شده است.",
    "url"              => "قالب :attribute نامعتبر می باشد.",

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

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(),

);
