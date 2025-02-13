<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Products;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $countProducts = Products::count();
        return [
            Stat::make('Jumlah Produk', $countProducts . ' Produk'),
        ];
    }
}
