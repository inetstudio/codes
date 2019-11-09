<?php

namespace InetStudio\CodesPackage\Codes\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;
use InetStudio\CodesPackage\Codes\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  CodeModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(CodeModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'user' => view(
                    'admin.module.codes-package.codes::back.partials.datatables.user',
                    compact('item')
                )
                ->render(),
            'type' => view(
                'admin.module.codes-package.codes::back.partials.datatables.classifiers',
                [
                    'classifiers' => $item['classifiers'],
                ]
            )->render(),
            'code' => $item['code'],
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                    'admin.module.codes-package.codes::back.partials.datatables.actions',
                    compact('item')
                )
                ->render(),
        ];
    }
}
