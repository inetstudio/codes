<?php

namespace InetStudio\CodesPackage\Codes\Contracts\Services\Back;

use InetStudio\AdminPanel\Base\Contracts\Services\BaseServiceContract;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;

/**
 * Interface ItemsServiceContract.
 */
interface ItemsServiceContract extends BaseServiceContract
{
    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return CodeModelContract
     */
    public function save(array $data, int $id): CodeModelContract;
}
