<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\CodesPackage\Codes\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/codes-package',
    ],
    function () {
        Route::any('codes/data/index', 'DataControllerContract@getIndexData')
            ->name('back.codes-package.codes.data.index');

        Route::get('codes/export', 'ExportControllerContract@exportItems')
            ->name('back.codes-package.codes.export');

        Route::resource(
            'codes', 'ResourceControllerContract',
            [
                'as' => 'back.codes-package',
            ]
        );
    }
);

Route::group(
    [
        'namespace' => 'InetStudio\CodesPackage\Codes\Contracts\Http\Controllers\Front',
        'middleware' => ['web', 'auth'],
    ],
    function () {
        Route::post('codes/redeem', 'ItemsControllerContract@redeemItem')
            ->name('front.codes.redeem');
    }
);