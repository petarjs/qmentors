<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.company_name', 'Quantox');
        $this->migrator->add('general.company_logo', '/images/logo.svg');
    }
}
