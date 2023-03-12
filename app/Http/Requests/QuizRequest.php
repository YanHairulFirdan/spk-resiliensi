<?php

namespace App\Http\Requests;

use App\Aspect;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class QuizRequest extends FormRequest
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
        $aspects = Aspect::all();

        
        $rules = $aspects->flatMap(function ($aspect) {
            return [
                Str::snake($aspect->aspect) => 'required|array|min:5',
            ];
        })->toArray();

        return $rules;
    }
}
