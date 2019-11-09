<?php

namespace InetStudio\CodesPackage\Codes\Transformers\Back\Resource;

use League\Fractal\TransformerAbstract;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;
use InetStudio\CodesPackage\Codes\Contracts\Transformers\Back\Resource\ShowTransformerContract;

/**
 * Class ShowTransformer.
 */
class ShowTransformer extends TransformerAbstract implements ShowTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  CodeModelContract  $item
     *
     * @return array
     */
    public function transform(CodeModelContract $item): array
    {
        return $item->toArray();
    }
}
