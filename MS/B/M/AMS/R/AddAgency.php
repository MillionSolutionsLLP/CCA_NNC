<?php

namespace B\AMS\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AddAgency extends FormRequest
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


          $id=0;
            $conection=\B\AMS\Base::getConnection($id);
            $table=\B\AMS\Base::getTable($id);
            $key='UniqId';
            $rules="unique:".$conection.".".$table.",".$key;



         return [
            'UniqId'=>"required|".$rules,
            'Name'=>"required",
            // 'AddressLine1'=>"required",
            // 'AddressLine2'=>"required",
            // 'AddressLine3'=>"required",
            // 'Landmark'=>"required",
            // 'City'=>"required",
            // 'State'=>"required",
            // 'Pincode'=>"required",
            'Username'=>"required",
            'Password'=>"required",
            'ConfirmPassword'=>"required|same:Password",

            // 'AttName'=>"required",
            // 'AttConatctNo'=>"required",
            // 'AttEmail'=>"required|email",
          //  'AllocatedJobs'=>"required",
            'Status'=>"required|boolean"
          
          
          
            ];

    }

    protected function formatErrors(Validator $validator)
{
    

        

    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}