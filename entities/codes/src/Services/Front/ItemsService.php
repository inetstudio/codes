<?php

namespace InetStudio\CodesPackage\Codes\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
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

    /**
     * Записываем действие пользователя.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     *
     * @return CodeModelContract|null
     *
     * @throws BindingResolutionException
     */
    public function codeAction(int $userId, string $actionAlias): ?CodeModelContract
    {
        $usersRepository = app()->make('InetStudio\ACL\Users\Contracts\Repositories\UsersRepositoryContract');
        $actionsService = app()->make('InetStudio\CodesPackage\Actions\Contracts\Services\Front\ItemsServiceContract');

        $user = $usersRepository->getItemById($userId);
        $action = $actionsService->getModel()->where('alias', '=', $actionAlias)->first();

        if (! $user['id'] || ! $action) {
            return null;
        }

        if ($action['single']) {
            $codesCount = $this->getModel()
                ->where(
                    [
                        ['user_id', '=', $user['id']],
                        ['action_id', '=', $action['id']],
                    ]
                )
                ->count();

            if ($codesCount > 0) {
                return null;
            }
        }

        $data = [
            'user_id' => $user['id'],
            'action_id' => $action['id'],
            'points' => $action['points'],
        ];

        $code = $this->saveModel($data, 0);

        return $code;
    }
}
