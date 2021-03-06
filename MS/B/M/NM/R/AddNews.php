<?php

namespace B\NM\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AddNews extends FormRequest
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
            'NewsTitle'=>"required",
            'NewsContent'=>"required",
            'NewsDate'=>"required",
            'NewsDateExp'=>"required",



          
          
            ];

    }

    protected function formatErrors(Validator $validator)
{
    
    
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}