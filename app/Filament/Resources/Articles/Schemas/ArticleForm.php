<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    Select::make('categories')
                        ->relationship('categories', 'title')
                        ->required()
                        ->multiple()
                        ->preload()
                        ->createOptionForm([
                            Section::make([
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('slug')
                                    ->required(),
                            ])->columnSpanFull()->columns(2)->label('Category Details'),
                            Section::make([
                                TextInput::make('meta_title')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('meta_description')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('meta_keywords')
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columnSpanFull()->columns(2)->label('Meta Details'),

                        ]),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    Textarea::make('slug')
                        ->required(),
                    RichEditor::make('description')
                        ->columnSpanFull()
                        ->required(),
                    FileUpload::make('image')
                        ->disk('public')
                        ->image()
                        ->required(),
                ])->columnSpanFull()->columns(2)->label('Article Details'),
                Section::make([
                    TextInput::make('meta_title')
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('meta_description')
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('meta_keywords')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpanFull()->columns(2)->label('Meta Details'),
            ]);
    }
}
