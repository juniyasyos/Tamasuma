<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2) // 2 kolom layout utama
            ->components([
                Section::make('User Information')
                    ->description('Informasi akun utama pengguna')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Username')
                                ->required()
                                ->autofocus(),

                            TextInput::make('email')
                                ->email()
                                ->required(),
                        ]),
                        DateTimePicker::make('email_verified_at')
                            ->label('Verified At')
                            ->seconds(false)
                            ->nullable(),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),

                Section::make('User Profile')
                    ->relationship('profile')
                    ->description('Data profil pribadi pengguna')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('full_name')
                                ->label('Full Name')
                                ->columnSpan(2),

                            DatePicker::make('birth_date')
                                ->label('Birth Date')
                                ->closeOnDateSelection(),

                            Select::make('gender')
                                ->options([
                                    'male' => 'Male',
                                    'female' => 'Female',
                                ])
                                ->label('Gender')
                                ->native(false)
                                ->searchable(),
                        ]),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),

                Section::make('Contact Channels')
                    ->description('Tambah hingga 3 kontak untuk pengguna ini')
                    ->schema([
                        Repeater::make('contactChannels')
                            ->label('Contact Person')
                            ->relationship()
                            ->maxItems(3)
                            ->columns(2)
                            ->schema([
                                Select::make('type')
                                    ->options([
                                        'whatsapp' => 'WhatsApp',
                                        'telegram' => 'Telegram',
                                        'email' => 'Email',
                                        'slack' => 'Slack',
                                        'phone' => 'Phone',
                                    ])
                                    ->required()
                                    ->label('Channel Type')
                                    ->native(false),

                                TextInput::make('value')
                                    ->required()
                                    ->label('Contact Detail'),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }
}
