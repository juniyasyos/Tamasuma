<?php

namespace App\Filament\Resources\Courses\RelationManagers;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ModulesRelationManager extends RelationManager
{
    protected static string $relationship = 'modules';

    protected static ?string $relatedResource = CourseResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),

                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->sortable()
                    ->alignCenter()
                    ->color(fn (string $state): string => match ($state) {
                        'text' => 'warning',
                        'video' => 'success',
                        'quiz' => 'danger',
                    }),

            ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
