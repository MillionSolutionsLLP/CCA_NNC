<?php

namespace B\IM\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class Ward extends FormRequest
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
            "ProductCode"=>"array",
            "ProductQuantity"=>"array",
            "ProductRate"=>"array",
            "WarehouseCode"=>"required|exists:IM_Master.IM_Warehouse_Master,UniqId",
     
          
          
            ];

    }

    protected function formatErrors(Validator $validator)
{
    
    
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}