<?php

namespace InetStudio\CodesPackage\Codes\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\CodesPackage\Codes\Contracts\Http\Requests\Front\RedeemItemRequestContract;

/**
 * Class RedeemItemRequest.
 */
class RedeemItemRequest extends FormRequest implements RedeemItemRequestContract
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
            'code.exists' => 'Указан неверный код',
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
            'code' => 'exists:codes,code',
        ];
    }
}
