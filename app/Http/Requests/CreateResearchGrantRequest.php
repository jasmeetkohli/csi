<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateResearchGrantRequest extends Request
{

    private $form_fields = [
                                  'grantProposal'=>'required|mimes:pdf',
                                  'fieldName'=>'required',
                                  'title_g'=>'required',
                                  'teamMembers'=>'required',
                                  'researchPlace'=>'required',
                                  //'duration'=>'required',
                                  'grantNeeded'=>'required',
                                  'propDescription'=>'required'

                            ];

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
        
        return  $this->form_fields;

    }
}
