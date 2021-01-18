<?php

namespace InetStudio\CodesPackage\Codes\Models\Traits;

use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;

trait HasCodes
{
    public static function getCodeClassName(): string
    {
        $model = resolve(CodeModelContract::class);

        return get_class($model);
    }

    public function codes()
    {
        $className = $this->getCodeClassName();

        return $this->morphMany($className, 'codeable');
    }
}
