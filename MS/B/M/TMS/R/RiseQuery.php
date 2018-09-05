<?php

namespace B\TMS\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RiseQuery extends FormRequest
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
  

            'SelectedFiles'=>'required|array',
         //   'SelectedFiles'=>'required',
          
            ];

    }

    protected function formatErrors(Validator $validator)
{
    
    
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}


public function messages()
{
    return [


    'SelectedFiles.required'=>"Please select at least one file that you have to query and unchecked document will automatically approve.",
      'SelectedFilesQuery.required'=>"Please write Detailed query about objected documents & details that you are expecting from agency."


    ];
}

}