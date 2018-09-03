<?php

namespace B\ATMS\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UploadDocuments extends FormRequest
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
          //  'UniqId'=>"required",
            'TypeOfDocuments.*' =>'required',
            'DateOfDocument.*'  =>'required',
            'agencyDocument'    =>'required',
            'NoOfDocument.*'    =>"nullable|required_if:TypeOfDocuments.*,777|required_if:TypeOfDocuments.*,888",
            'AmountOfDocument.*'=>"nullable|required_if:TypeOfDocuments.*,777|required_if:TypeOfDocuments.*,888|numeric"
     
          
          
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

        'NoOfDocument.*.required_if'=>"Unique Document No like Invoice no./Bill No. Required",
        'AmountOfDocument.*.required_if'=>"Total Amount required that is displayed in selected Bill/Invoice",
        'DateOfDocument.*.required'=>"Date of document Required."
    ];
}


}