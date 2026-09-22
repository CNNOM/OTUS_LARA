<?php

namespace App\Filament\Resources\Tours\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ToursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Фото')->disk('public')->visibility('public'),
                TextColumn::make('title')->label('Название')->searchable()->sortable(),
                TextColumn::make('country')->label('Страна')->searchable()->sortable(),
                TextColumn::make('category')->label('Категория')->searchable(),
                TextColumn::make('duration_days')->label('Дней')->sortable(),
                TextColumn::make('price')->label('Цена')->money('USD')->sortable(),
                TextColumn::make('rating')->label('Рейтинг')->sortable(),
                ToggleColumn::make('is_active')->label('Опубликован'),
            ])
            ->defaultSort('id', 'desc')
            ->filters([TernaryFilter::make('is_active')->label('Опубликован')])
            ->recordActions([EditAction::make(), DeleteAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }
}
