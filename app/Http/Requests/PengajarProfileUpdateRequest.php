<?php

namespace App\Http\Requests;

use App\Models\Pengajar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_lengkap' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(Pengajar::class)->ignore($this->user()->id)],
        ];
    }
}
