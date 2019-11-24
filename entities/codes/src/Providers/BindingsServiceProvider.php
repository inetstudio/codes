<?php

namespace InetStudio\CodesPackage\Codes\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
     * @var  array
     */
    public $bindings = [
        'InetStudio\CodesPackage\Codes\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\CodesPackage\Codes\Events\Back\ModifyItemEvent',
        'InetStudio\CodesPackage\Codes\Contracts\Events\Front\RedeemItemEventContract' => 'InetStudio\CodesPackage\Codes\Events\Front\RedeemItemEvent',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\CodesPackage\Codes\Http\Controllers\Back\ResourceController',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\CodesPackage\Codes\Http\Controllers\Back\DataController',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Controllers\Front\ItemsControllerContract' => 'InetStudio\CodesPackage\Codes\Http\Controllers\Front\ItemsController',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\CodesPackage\Codes\Http\Requests\Back\SaveItemRequest',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Requests\Front\RedeemItemRequestContract' => 'InetStudio\CodesPackage\Codes\Http\Requests\Front\RedeemItemRequest',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Back\Data\GetIndexDataResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\CreateResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource\CreateResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\EditResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource\EditResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Front\RedeemItemResponseContract' => 'InetStudio\CodesPackage\Codes\Http\Responses\Front\RedeemItemResponse',
        'InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract' => 'InetStudio\CodesPackage\Codes\Models\CodeModel',
        'InetStudio\CodesPackage\Codes\Contracts\Services\Back\DataTables\IndexServiceContract' => 'InetStudio\CodesPackage\Codes\Services\Back\DataTables\IndexService',
        'InetStudio\CodesPackage\Codes\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\CodesPackage\Codes\Services\Back\ItemsService',
        'InetStudio\CodesPackage\Codes\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\CodesPackage\Codes\Services\Front\ItemsService',
        'InetStudio\CodesPackage\Codes\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\CodesPackage\Codes\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\CodesPackage\Codes\Contracts\Transformers\Back\Resource\ShowTransformerContract' => 'InetStudio\CodesPackage\Codes\Transformers\Back\Resource\ShowTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
