<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 xsm:items-center py-0 sm:pt-0">


            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">



                <div class="mt-12 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="container">


                        <div class="p-12 row">

                            <div class="form col-md-3">
                                <div class="container">
                                    <h3>Добавить</h3>
                                    <form class="add-card-form" method="post" action="{{ route('cards.add') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group"><input type="text"  name="name" placeholder="Имя" required ></div>
                                        <div class="input-group"><input type="phone" name="phone"  placeholder="Телефон" required ></div>
                                        <small>Например: +79991235678, +7(999)123-56-78, 89991235678</small>
                                        <div class="input-group"><textarea  name="description"  placeholder="Краткое описание"  ></textarea></div>
                                        <p>Выберите фото в формате (jpg,png)</p>
                                        <div class="image">
                                            <input type="file" class="form-control"  name="image">
                                        </div>
                                        <div class="post_button">
                                            <button type="submit" class="btn btn-success">Добавить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="flex xitems-center col-md-9">
                                <div class="ml-12">
                                    <h3>Телефонные номера</h3>
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm" id="phone_books_items">

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>


            </div>
        </div>
    </body>

<style>
    .button-add {cursor: pointer;}
    #phone_books_items table-cards {width: 100%;}
    .table-cards {font-size: 13px;}
    .table-cards td {border: 1px solid #ccc;
        padding: 3px;}
    .table-cards td.image {width: 100px;}
    .table-cards td.image img {width:100px;border-radius: 10px;}
    .table-cards td.name {width: 150px;}
    .table-cards td.phone {width: 150px;}
</style>
</html>
