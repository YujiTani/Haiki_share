<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hankaku implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // 達成条件
        return preg_match('/^[a-zA-Z0-9_-.]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // エラー時のメッセージ
        return ':attribute は半角英数字で入力してください';
    }
}
