<?php

namespace App\Http\Requests;

class TypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|max:128",
            "hatch_day" => "required|integer",
            "comment" => "max:512",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "종 명칭을 입력하십시오.",
            "name.max" => "128자 이내로 입력하십시오.",
            "hatch_day.required" => "해칭 소요 기간을 입력하십시오",
            "hatch_day.integer" => "해칭 소요 기간의 형식이 숫자가 아닙니다.",
            "comment.max" => "설명은 최대 512자입니다."
        ];
    }
}
