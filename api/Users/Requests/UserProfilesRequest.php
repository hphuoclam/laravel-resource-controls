<?php

namespace Api\Users\Requests;

use Infrastructure\Http\ApiRequest;

class UserProfilesRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'profiles' => 'array|required'
        ];
    }
}
