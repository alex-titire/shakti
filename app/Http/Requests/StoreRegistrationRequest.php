<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

class StoreRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $biggest_year = date("Y") - 1988;
        $year_oldest = date("Y") - 100;
        $year_youngest = date("Y") - 18;
        return [
            'language' => 'required|in:en,ro',
            'gender' => 'required|in:m,f',
            'last_name' => 'required|min:3',
            'first_name' => 'required|min:3',
            'baptism_name' => 'nullable|min:3',
            'group' => "required|integer|between:0,{$biggest_year}",
            'city' => 'required', //|exists:cities
//            'dob' => 'required|date',
            'dob_day' => 'required|integer|between:1,31',
            'dob_month' => 'required|integer|between:1,12',
            'dob_year' => "required|integer|between:{$year_oldest},{$year_youngest}",
            'phone' => 'required',
            'email' => 'required|email',
            // 'password' => 'required_if:save_user,1|confirmed',
            'has_aza' => 'required|in:1,2',
            'aza' => 'required_if:has_aza,2',
            'student' => 'required|in:en,ro',
            'attending' => 'required|in:live,online',
            'payment' => 'required|in:cash,card,transfer',
            'agreement_req' => 'required',
            'privacy_req' => 'required',
            'terms_req' => 'required',
            'age_req' => 'required',
            'picture_front' => 'required|mimes:jpg,png,gif,webp',
//            'picture_side' => 'required|mimes:jpg,jpeg,bmp,png',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $img = Image::make($this->picture_front);
            $min_size = min($img->width(), $img->height());

            if ($min_size < 800) {
                $validator->errors()->add('image_face', __('general.image_too_small'));
            }
        });
    }

    public function messages()
    {
        App::setLocale($this->language);

        return [
            'aza_type.required_if' => __('general.aza_type_error')
        ];
    }

    public function attributes()
    {
        App::setLocale($this->language);

        return [
            'gender' => __('general.gender_select'),
            'last_name' => __('general.last_name'),
            'first_name' => __('general.first_name'),
            'baptism_name' => __('general.baptism_name'),
            'group' => __('general.group'),
            'city' => __('general.city'),
            'dob' => __('general.dob'),
            'dob_month' => __('general.month'),
            'dob_day' => __('general.day'),
            'dob_year' => __('general.year'),
            'phone' => __('general.phone'),
            'email' => __('general.email'),
            'password' => __('general.password'),
            'has_aza' => __('general.aza'),
            'aza' => __('general.aza_type'),
            'student' => __('general.student_field'),
            'payment' => __('general.payment_field'),
            'agreement_req' => __('general.agreement_field'),
            'privacy_req' => __('general.privacy_field'),
            'attending' => __('general.attendance_field'),
            'terms_req' => __('general.terms_field'),
            'age_req' => __('general.age_field'),
            'picture_front' => __('general.image_face'),
            'picture_side' => __('general.image_side'),
        ];
    }
}
