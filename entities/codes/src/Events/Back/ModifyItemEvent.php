<?php

namespace InetStudio\CodesPackage\Codes\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;
use InetStudio\CodesPackage\Codes\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var CodeModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  CodeModelContract  $item
     */
    public function __construct(CodeModelContract $item)
    {
        $this->item = $item;
    }
}
