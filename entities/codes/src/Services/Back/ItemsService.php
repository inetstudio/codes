<?php

namespace InetStudio\CodesPackage\Codes\Services\Back;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;
use InetStudio\CodesPackage\Codes\Contracts\Services\Back\ItemsServiceContract;

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
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return CodeModelContract
     *
     * @throws BindingResolutionException
     */
    public function save(array $data, int $id): CodeModelContract
    {
        $action = ($id) ? 'отредактирован' : 'создан';

        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        $classifiersData = Arr::get($data, 'classifiers', []);
        app()->make('InetStudio\Classifiers\Entries\Contracts\Services\Back\ItemsServiceContract')
            ->attachToObject($classifiersData, $item);

        event(
            app()->make(
                'InetStudio\CodesPackage\Codes\Contracts\Events\Back\ModifyItemEventContract',
                compact('item')
            )
        );

        Session::flash('success', 'Код успешно '.$action);

        return $item;
    }
}
