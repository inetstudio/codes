<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\CodesPackage\Codes\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/codes-package',
    ],
    function () {
        Route::any('codes-package/codes/data/index', 'DataControllerContract@getIndexData')
            ->name('back.codes-package.codes.data.index');

        Route::resource(
            'codes', 'ResourceControllerContract',
            [
                'as' => 'back.codes-package',
            ]
        );
    }
);
