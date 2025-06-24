<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Username')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => 'ID: '.$record->id)
                    ->tooltip('Nama pengguna untuk login')
                    ->weight('medium')
                    ->toggleable(),

                TextColumn::make('email')
                    ->copyable()
                    ->copyMessage('Email copied')
                    ->copyMessageDuration(1500)
                    ->tooltip('Klik untuk salin email')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('email_verified_at')
                    ->label('Verified At')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->tooltip(fn ($state) => $state ? 'Email sudah diverifikasi' : 'Belum diverifikasi')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->color('info')
                    ->tooltip('Tanggal akun dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->color('warning')
                    ->tooltip('Terakhir kali diubah')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah')
                    ->tooltip('Edit data pengguna ini'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->color('danger'),
                ]),
            ]);

    }
}