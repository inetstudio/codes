<?php

namespace InetStudio\CodesPackage\Codes\Http\Responses\Front;

use Illuminate\Http\Request;
use InetStudio\CodesPackage\Codes\Contracts\Http\Responses\Front\RedeemItemResponseContract;
use InetStudio\ACL\Users\Contracts\Services\Front\ItemsServiceContract as UsersServiceContract;
use InetStudio\CodesPackage\Codes\Contracts\Services\Front\ItemsServiceContract as CodesServiceContract;

/**
 * Class RedeemItemResponse.
 */
class RedeemItemResponse implements RedeemItemResponseContract
{
    /**
     * @var CodesServiceContract
     */
    protected $codesService;

    /**
     * @var UsersServiceContract
     */
    protected $usersService;

    /**
     * RedeemItemResponse constructor.
     *
     * @param  CodesServiceContract  $codesService
     * @param  UsersServiceContract  $usersService
     */
    public function __construct(CodesServiceContract $codesService, UsersServiceContract $usersService)
    {
        $this->codesService = $codesService;
        $this->usersService = $usersService;
    }

    /**
     * Возвращаем ответ при удалении объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|null
     */
    public function toResponse($request)
    {
        $code = $request->get('code');
        $userId = $this->usersService->getUserId();

        $result = $this->codesService->redeem($code, $userId);

        return response()->json($result);
    }
}
