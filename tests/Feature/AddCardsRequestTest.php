<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;


class AddCardsRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    /** @test */
    public function validate_phone_formats_fail()
    {
        /*
            * Пользователь может вводить номер телефона в трёх форматах: +79991235678, +7(999)123-56-78, 89991235678
            */
        $arPhones = [
            "+799912356783",
            "7(999)123-56-78",
            "89991235678gfdgdf",
            null,
            2,
            "1"
        ];
        foreach ($arPhones as $phone) {
            $response = $this->postJson(route('cards.add'), ['name' => "Иванов","phone"=>$phone]);
            $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
            $response->assertJsonValidationErrors([ 'phone']);
        }
    }


    /** @test */
    public function validate_phone_formats_pass()
    {
        /*
            * Пользователь может вводить номер телефона в трёх форматах: +79991235678, +7(999)123-56-78, 89991235678
            */
        $arPhones = [
            "+79991235678", "+7(999)123-56-78", "89991235678"
        ];
        foreach ($arPhones as $phone) {
            $response = $this->postJson(route('cards.add'), ['name' => "Иванов","phone"=>$phone]);
            $response->assertStatus(Response::HTTP_OK);
         //   dd($response->getContent());
            $response->assertJsonMissingValidationErrors([
                'name',
                'phone'
            ]);
        }
    }

    /** @test */
    public function validate_name_fail()
    {
        $response = $this->postJson(route('cards.add'), ['name' => null]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors('name');

    }

    protected function setUp(): void
    {
        parent::setUp();
        // $this->user = factory(User::class)->create();
    }

}
