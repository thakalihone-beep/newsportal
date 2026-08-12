<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\Filament\UsersPanelProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    UsersPanelProvider::class,
];
