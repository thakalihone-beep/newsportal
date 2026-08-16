<?php

namespace App\Filament\Resources\Advertises\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdvertiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('contact_number')
                    ->required(),
                TextInput::make('redirect_link')
                    ->required(),
                DatePicker::make('expire_date')
                    ->required(),
                FileUpload::make('banner')
                    ->disk('public')
                    ->directory('ads')
                    ->image()
                    ->required(),
            ]);
    }
}
