<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    private $table            = 'article';

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
        $id = $this->id;

        $condName = "bail|required|between:5,100|unique:$this->table,name";
        $condThumb= 'bail|required|image|max:500';
        $condCategoryId = 'bail|required';

        if(!empty($id)){
            $condName .= ",$id";
            $condThumb = 'bail|image|max:500';
            $condCategoryId = '';
        }

        return [
            'name' => $condName,
            'content' => 'bail|required|min:5',
            'status' => 'bail|in:active,inactive',
            'category_id' => $condCategoryId,
            'thumb' => $condThumb
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Name không được rỗng',
            // 'name.min'      => 'Name :input chiều dài phải có ít nhất :min ký tứ',
        ];
    }
    public function attributes()
    {
        return [
            // 'description' => 'Field Description: ',
        ];
    }
}
