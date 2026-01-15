<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AvailableCarsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'start_time' => 'required|date_format:Y-m-d\TH:i:s',
            'end_time' => 'required|date_format:Y-m-d\TH:i:s|after:start_time',
            'model' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:comfort_categories,id',
        ];
    }
}
