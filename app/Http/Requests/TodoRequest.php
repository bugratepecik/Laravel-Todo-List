<?php

namespace App\Http\Requests;

use App\Rules\dateExpire;
use Illuminate\Foundation\Http\FormRequest;
use PHPUnit\Framework\Attributes\After;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dueDate'=>'after_or_equal:today|before_or_equal:12/31/2023'
        ];
    }
    public function messages(){
        return[
            'dueDate.after' => 'You entered a expired date. Please enter a date within the next year. ',
            'dueDate.before' =>'Please enter a date within the next year.'
        ];
    }
}
