<?php

namespace App\Filament\Resources\Tours\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TourForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->label('Название')->required()->maxLength(255),
            TextInput::make('country')->label('Страна')->required()->maxLength(255),
            TextInput::make('category')->label('Категория')->required()->maxLength(255),
            TextInput::make('duration_days')->label('Длительность, дней')->integer()->minValue(1)->maxValue(365)->required(),
            TextInput::make('price')->label('Цена, USD')->numeric()->minValue(0)->maxValue(99999999.99)->step(0.01)->required(),
            TextInput::make('rating')->label('Рейтинг')->numeric()->minValue(0)->maxValue(5)->step(0.1),
            Textarea::make('description')->label('Описание')->required()->maxLength(10000)->rows(4)->columnSpanFull(),
            Textarea::make('details')->label('О путешествии')->rows(4)->columnSpanFull(),
            Textarea::make('program')->label('Программа')->rows(4)->columnSpanFull(),
            Repeater::make('itinerary')->label('Этапы программы')->schema([
                TextInput::make('title')->label('Название этапа')->required(),
                Textarea::make('description')->label('Описание этапа')->required(),
            ])->defaultItems(0)->columnSpanFull(),
            Repeater::make('hotels')->label('Варианты размещения (демонстрационные)')->schema([
                TextInput::make('id')->label('Код отеля')->required()->maxLength(50),
                TextInput::make('name')->label('Название')->required(),
                TextInput::make('description')->label('Описание')->required(),
                TextInput::make('amenities')->label('Удобства')->required(),
                TextInput::make('image')->label('Путь к иллюстрации в public/')->required(),
                TextInput::make('extra_per_day')->label('Доплата за гостя в день, USD')->numeric()->minValue(0)->required(),
            ])->defaultItems(0)->columnSpanFull(),
            FileUpload::make('image')->label('Фотография')->image()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])->disk('public')->directory('tours')->visibility('public')->maxSize(5120)->columnSpanFull(),
            Toggle::make('is_active')->label('Опубликован на сайте')->default(false),
        ]);
    }
}
