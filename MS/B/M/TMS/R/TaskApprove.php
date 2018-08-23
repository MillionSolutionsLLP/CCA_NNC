<?php

namespace B\TMS\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AddTask extends FormRequest
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
         return [
            'UniqId'=>"required",
            'HireAgencyCode'=>"required",
            'NameOperator'=>"required",
            'NameOwner'=>"required",
            'AreaPiracy'=>"required",
            'IllegalTypeBroadcasting'=>"required",
            'StatusOperator'=>"required",
            'NameOfNetwork'=>"required",
          
          
            ];

    }

    protected function formatErrors(Validator $validator)
    {
    
    
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}