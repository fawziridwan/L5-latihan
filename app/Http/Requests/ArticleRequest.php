<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ArticleRequest extends FormRequest
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
        $id = $this->article;

        return [
            'title' =>'required|unique:articles,title|max:225',
            'content' =>'required|unique:articles,content|max:255',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()  
    {
        return [
            'title.require' =>'Title is required, at least fill a character',
            'title.unique' =>'Title must unique, take another title',
            'image' =>'Online Extension image Allowed'
        ];
    }
}