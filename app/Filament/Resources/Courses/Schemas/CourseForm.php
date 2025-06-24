<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Basic Information')
                            ->schema([
                                Section::make('Course Info')
                                    ->columnSpanFull()
                                    ->description('Basic information about the course')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Course Title')
                                                    ->required()
                                                    ->maxLength(255),

                                                Toggle::make('is_active')
                                                    ->label('Is Course Active?')
                                                    ->helperText('Control whether this course is available to students.'),
                                            ]),

                                        Textarea::make('description')
                                            ->label('Course Description')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        FileUpload::make('thumbnail')
                                            ->image()
                                            ->imageEditor()
                                            ->label('Course Thumbnail')
                                            ->disk('public')
                                            ->directory('thumbnails')
                                            ->columnSpanFull()
                                            ->helperText('Recommended aspect ratio 16:9.'),
                                    ])
                                    ->columns(1)
                                    ->collapsible(),

                            ]),
                        Tab::make('Details')
                            ->schema([
                                Section::make('Course Details')
                                    ->columnSpanFull()
                                    ->description('Modules and enrollments for this course')
                                    ->schema([
                                        Tabs::make('Details')
                                            ->columnSpanFull()
                                            ->tabs([
                                                Tabs\Tab::make('Modules')
                                                    ->schema([
                                                        Repeater::make('modules')
                                                            ->label('Course Modules')
                                                            ->relationship()
                                                            ->reorderable()
                                                            ->collapsible()
                                                            ->maxItems(10)
                                                            ->schema([
                                                                Grid::make(3)
                                                                    ->schema([
                                                                        TextInput::make('title')
                                                                            ->label('Module Title')
                                                                            ->required(),

                                                                        Select::make('type')
                                                                            ->label('Type')
                                                                            ->options([
                                                                                'video' => 'Video',
                                                                                'article' => 'Article',
                                                                                'quiz' => 'Quiz',
                                                                            ])
                                                                            ->required(),

                                                                        TextInput::make('order')
                                                                            ->label('Order')
                                                                            ->numeric()
                                                                            ->minValue(1)
                                                                            ->required(),
                                                                    ]),

                                                                Textarea::make('content')
                                                                    ->label('Module Content')
                                                                    ->rows(3)
                                                                    ->required()
                                                                    ->columnSpanFull(),
                                                            ]),
                                                    ]),

                                                Tabs\Tab::make('Enrollments')
                                                    ->schema([
                                                        Repeater::make('enrollments')
                                                            ->label('Course Enrollments')
                                                            ->relationship()
                                                            ->collapsible()
                                                            ->schema([
                                                                Grid::make(2)
                                                                    ->schema([
                                                                        Select::make('user_id')
                                                                            ->label('Enrolled User')
                                                                            ->relationship('user', 'name')
                                                                            ->searchable()
                                                                            ->required(),

                                                                        DatePicker::make('enrolled_at')
                                                                            ->label('Enrolled At')
                                                                            ->required(),
                                                                    ]),

                                                                Toggle::make('completed')
                                                                    ->label('Completed')
                                                                    ->helperText('Mark if the student has completed this course.'),
                                                            ]),
                                                    ]),
                                            ]),
                                    ])
                                    ->columns(1)
                                    ->collapsible(),
                            ]),
                    ]),
            ]);
    }
}
