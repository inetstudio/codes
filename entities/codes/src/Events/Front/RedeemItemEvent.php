<?php

namespace InetStudio\CodesPackage\Codes\Events\Front;

use Illuminate\Queue\SerializesModels;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;
use InetStudio\CodesPackage\Codes\Contracts\Events\Front\RedeemItemEventContract;

/**
 * Class RedeemItemEvent.
 */
class RedeemItemEvent implements RedeemItemEventContract
{
    use SerializesModels;

    /**
     * @var CodeModelContract
     */
    public $item;

    /**
     * RedeemItemEvent constructor.
     *
     * @param  CodeModelContract  $item
     */
    public function __construct(CodeModelContract $item)
    {
        $this->item = $item;
    }
}
