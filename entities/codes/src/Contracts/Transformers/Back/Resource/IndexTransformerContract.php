<?php

namespace InetStudio\CodesPackage\Codes\Contracts\Transformers\Back\Resource;

use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  CodeModelContract  $item
     *
     * @return array
     */
    public function transform(CodeModelContract $item): array;
}
