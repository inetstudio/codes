<?php

namespace InetStudio\CodesPackage\Codes\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class CreateClassifiersGroupCommand.
 */
class CreateClassifiersGroupCommand extends Command
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:codes-package:codes:classifiers_group';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Create codes classifiers group';

    /**
     * Запуск команды.
     *
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        $groupsService = app()->make('InetStudio\Classifiers\Groups\Contracts\Services\Back\ItemsServiceContract');

        if (DB::table('classifiers_groups')->where('alias', 'code_type')->count() == 0) {
            $groupsService->getModel()::updateOrCreate(
                [
                    'name' => 'Тип кода',
                ],
                [
                    'alias' => 'code_type',
                ]
            );
        }
    }
}
