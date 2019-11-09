<?php

namespace InetStudio\CodesPackage\Codes\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\CodesPackage\Codes\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Back\Resource\EditResponseContract;

/**
 * Class EditResponse.
 */
class EditResponse implements EditResponseContract
{
    /**
     * @var ItemsServiceContract
     */
    protected $resourceService;

    /**
     * EditResponse constructor.
     *
     * @param  ItemsServiceContract  $resourceService
     */
    public function __construct(ItemsServiceContract $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Возвращаем ответ при редактировании объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|null
     */
    public function toResponse($request)
    {
        $id = $request->route('code', 0);

        $item = $this->resourceService->getItemById($id);

        return response()->view('admin.module.codes-package.codes::back.pages.form', compact('item'));
    }
}
