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
}
