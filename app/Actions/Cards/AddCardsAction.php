<?php

namespace App\Actions\Cards;

use App\Models\PhoneBook;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AddCardsAction {


    /*
     * Сейчас идет простое добавление, но  можно сделать проверку, и если есть
     * такой номер телефона то не сохранять а обновлять.
     */
	public function execute(Request $request):JsonResponse {
        $phoneBook= new PhoneBook();
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Images'), $filename);
            $phoneBook->image= $filename;
        }
        $phoneBook->fill($request->all())->save();
        return response()->json(['error' => false]);
	}

}
