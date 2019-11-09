<?php

namespace InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\CodesPackage\Codes\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\CreateResponseContract;

/**
 * Class CreateResponse.
 */
class CreateResponse implements CreateResponseContract
{
    /**
     * @var ItemsServiceContract
     */
    protected $resourceService;

    /**
     * CreateResponse constructor.
     *
     * @param  ItemsServiceContract  $resourceService
     */
    public function __construct(ItemsServiceContract $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Возвращаем ответ при создании объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|null
     */
    public function toResponse($request)
    {
        $item = $this->resourceService->getItemById();

        return response()->view('admin.module.codes-package.codes::back.pages.form', compact('item'));
    }
}
