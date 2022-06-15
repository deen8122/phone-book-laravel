<?php

namespace App\Http\Controllers;

use App\Models\PhoneBook;
use Illuminate\Http\Request;
use App\Actions\Cards\AddCardsAction;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Cards\AddCardsRequest;
class CardController extends Controller {

    private $bookPaginateCount = 100;//Количество книг

    /**
     * Список данных
     * @return JsonResponse
     */
	public function getCards():JsonResponse {
        return response()->json(PhoneBook::orderBy('id','desc')->paginate($this->bookPaginateCount));
	}

    /**
     * Добавление
     * @param Request $request
     * @return JsonResponse
     */
    public function addCards(AddCardsRequest $request,AddCardsAction $addCardsAction):JsonResponse {
        return $addCardsAction->execute($request);
    }
}
