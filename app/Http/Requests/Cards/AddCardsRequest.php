<?php


namespace App\Http\Requests\Cards;
use Illuminate\Foundation\Http\FormRequest;

class AddCardsRequest extends FormRequest {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
            'name'=>'required|string',
            /*
             * Пользователь может вводить номер телефона в трёх форматах: +79991235678, +7(999)123-56-78, 89991235678
             */
            'phone' =>  ['required', 'regex:/(\+7[0-9]{10}$)|(8[0-9]{10}$)|(\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$)/'],
            'description' => 'nullable|string|max:400',
            'image' => 'nullable|image',

		];
	}

}
