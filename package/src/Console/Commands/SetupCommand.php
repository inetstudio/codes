<?php

namespace InetStudio\CodesPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:codes-package:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup codes package';

    /**
     * Инициализация команд.
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Codes setup',
                'command' => 'inetstudio:codes-package:codes:setup',
            ],
        ];
    }
}
