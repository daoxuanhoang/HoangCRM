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

    'accepted' => 'Thuộc tính: phải được chấp nhận.',
    'active_url' => 'Thuộc tính: không phải là một URL hợp lệ.',
    'after' => 'Thuộc tính: phải là ngày sau: date.',
    'after_or_equal' => 'Thuộc tính: phải là ngày sau hoặc bằng: date.',
    'alpha' => 'Thuộc tính: chỉ có thể chứa các chữ cái.',
    'alpha_dash' => 'Thuộc tính: chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => 'Thuộc tính: chỉ có thể chứa các chữ cái và số.',
    'array' => 'Thuộc tính: phải là một mảng.',
    'before' => 'Thuộc tính: phải là một ngày trước: date.',
    'before_or_equal' => 'Thuộc tính: phải là một ngày trước hoặc bằng: date.',
    'between' => [
        'numeric' => 'Thuộc tính: phải nằm giữa: min và: max.',
        'file' => 'Thuộc tính: phải nằm trong khoảng: min và: max kilobyte.',
        'string' => 'Thuộc tính: phải nằm giữa các ký tự: min và: max.',
        'array' => 'Thuộc tính: phải có giữa các mục: min và: max.',
    ],
    'boolean' => 'thuộc tính: phải đúng hoặc sai.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'Thuộc tính: không phải là ngày hợp lệ.',
    'date_equals' => 'Thuộc tính: phải là một ngày bằng: date.',
    'date_format' => 'Thuộc tính: không khớp với format: format.',
    'different' => 'Thuộc tính: và: other phải khác.',
    'digits' => 'Thuộc tính: phải là: các chữ số.',
    'digits_between' => 'Thuộc tính: phải nằm giữa các chữ số: min và: max.',
    'dimensions' => 'Thuộc tính: có kích thước hình ảnh không hợp lệ.',
    'distinct' => 'Trường thuộc tính: có giá trị trùng lặp.',
    'email' => 'Thuộc tính: phải là một địa chỉ email hợp lệ.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'Thuộc tính đã chọn: không hợp lệ. ',
    'file' => 'Thuộc tính: phải là một tệp. ',
    'filled' => 'thuộc tính: phải có một giá trị. ',
    'gt' => [
        'numeric' => 'Thuộc tính: phải lớn hơn: value.',
        'file' => 'Thuộc tính: phải lớn hơn: kilobyte giá trị.',
        'string' => 'Thuộc tính: phải lớn hơn: các ký tự giá trị.',
        'array' => 'Thuộc tính: phải có nhiều hơn: giá trị mục.',
    ],
    'gte' => [
        'numeric' => 'Thuộc tính: phải lớn hơn hoặc bằng: value.',
        'file' => 'Thuộc tính: phải lớn hơn hoặc bằng: giá trị kilobyte.',
        'string' => 'Thuộc tính: phải lớn hơn hoặc bằng: các ký tự giá trị.',
        'array' => 'Thuộc tính: phải có: các mục giá trị trở lên.',
    ],
    'image' => 'Thuộc tính: phải là một hình ảnh.',
    'in' => 'Thuộc tính đã chọn: không hợp lệ.',
    'in_array' => 'Trường thuộc tính: không tồn tại trong: other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'Thuộc tính: phải là địa chỉ IP hợp lệ.',
    'ipv4' => 'Thuộc tính: phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => 'Thuộc tính: phải là địa chỉ IPv6 hợp lệ.',
    'json' => 'Thuộc tính: phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => 'Thuộc tính: phải nhỏ hơn: value.',
        'file' => 'Thuộc tính: phải nhỏ hơn: giá trị kilobyte.',
        'string' => 'Thuộc tính: phải ít hơn: ký tự giá trị.',
        'array' => 'Thuộc tính: phải có ít hơn: giá trị các mục.',
    ],
    'lte' => [
        'numeric' => 'Thuộc tính: phải nhỏ hơn hoặc bằng: value.',
        'file' => 'Thuộc tính: phải nhỏ hơn hoặc bằng: giá trị kilobyte.',
        'string' => 'Thuộc tính: phải nhỏ hơn hoặc bằng: ký tự giá trị.',
        'array' => 'Thuộc tính: không được có nhiều hơn: giá trị mục.',
    ],
    'max' => [
        'numeric' => 'Thuộc tính: không được lớn hơn: max.',
        'file' => 'Thuộc tính: không được lớn hơn: kilobyte tối đa.',
        'string' => 'Thuộc tính: không được lớn hơn: ký tự tối đa.',
        'array' => 'Thuộc tính: không được có nhiều hơn: mục tối đa.',
    ],
    'mimes' => 'Thuộc tính: phải là một tệp thuộc loại:: giá trị.',
    'mimetypes' => 'Thuộc tính: phải là một tệp có kiểu:: các giá trị.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

    'attributes' => [],

];
