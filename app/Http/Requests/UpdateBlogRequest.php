<?php

namespace App\Http\Requests;

use App\Enums\BlogStatus;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'banner_url' => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'blog_body' => 'required|string',
            'is_approved' => 'required',
            'status' => ["required", new EnumValue(BlogStatus::class, false)],
            'tags_id' => 'required|array',
            'categories_id' => 'required|array',
        ];
    }
}
