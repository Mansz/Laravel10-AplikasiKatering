<?php

namespace App\Filament\Dashboards;

use App\Filament\Widgets\StatsOverview;


class Dashboard extends Dashboard // Extend the correct base class
{
    protected static ?string $title = 'Dashboard'; // Define the title of the dashboard
    protected function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}