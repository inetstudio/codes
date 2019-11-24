<?php

namespace InetStudio\CodesPackage\Codes\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;
use InetStudio\CodesPackage\Codes\Contracts\Services\Front\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  CodeModelContract  $model
     */
    public function __construct(CodeModelContract $model)
    {
        parent::__construct($model);
    }


    public function redeem(string $code, int $userId)
    {
        $item = $this->model->where([
            ['code', '=', $code],
        ])->first();

        if (! $item) {
            return [
                'message' => 'Код не найден',
                'success' => false,
            ];
        }

        if ($item->user_id != 0) {
            return [
                'message' => 'Данный код уже был использован',
                'success' => false,
            ];
        }

        $item->user_id = $userId;
        $item->save();

        event(
            app()->make(
                'InetStudio\CodesPackage\Codes\Contracts\Events\Front\RedeemItemEventContract',
                compact('item')
            )
        );

        return [
            'message' => 'Код успешно использован',
            'success' => true,
        ];
    }
}
