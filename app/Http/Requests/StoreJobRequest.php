<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:jobs',
            'status' => 'required|in:1,2',
        ];

        if($this->status == 2){
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'description' => 'required',
                'company' => 'required',
                'about' => 'required',
                'benefices' => 'required',
                'requisites' => 'required',
                'responsabilities' => 'required',
                'requirements' => 'required',
                'company_url' => 'required',
                'company_email' => 'required',
                'company_phone' => 'required',
                'location' => 'required',
                'type' => 'required',
                'salary' => 'required',
            ]);
        }
        return $rules;
    }
}
