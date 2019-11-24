<?php

namespace InetStudio\CodesPackage\Codes\Http\Controllers\Front;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\CodesPackage\Codes\Contracts\Http\Controllers\Front\ItemsControllerContract;
use InetStudio\CodesPackage\Codes\Contracts\Http\Requests\Front\RedeemItemRequestContract;
use InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Front\RedeemItemResponseContract;

/**
 * Class ItemsController.
 */
class ItemsController extends Controller implements ItemsControllerContract
{
    /**
     * Погашаем код.
     *
     * @param  RedeemItemRequestContract  $request
     * @param  RedeemItemResponseContract  $response
     *
     * @return RedeemItemResponseContract
     */
    public function redeemItem(RedeemItemRequestContract $request, RedeemItemResponseContract $response): RedeemItemResponseContract
    {
        return $response;
    }
}
