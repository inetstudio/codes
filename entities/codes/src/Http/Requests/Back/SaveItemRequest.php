<?php

namespace InetStudio\CodesPackage\Codes\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\CodesPackage\Codes\Contracts\Http\Requests\Back\SaveItemRequestContract;

/**
 * Class SaveItemRequest.
 */
class SaveItemRequest extends FormRequest implements SaveItemRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'user_id.exists' => 'Пользователь с указанным параметром id не существует',
            'code.required' => 'Поле «Код» обязательно для заполнения',
            'code.max' => 'Поле «Код» не должно превышать 255 символов',
        ];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'nullable|exists:users,id',
            'code' => 'required|max:255',
        ];
    }
}
