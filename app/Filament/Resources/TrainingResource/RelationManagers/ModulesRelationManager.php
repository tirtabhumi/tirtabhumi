<?php

namespace App\Filament\Resources\TrainingResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ModulesRelationManager extends RelationManager
{
    protected static string $relationship = 'modules';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description'),
                Forms\Components\Select::make('type')
                    ->options([
                        'video' => 'Video (URL)',
                        'pdf' => 'PDF (File)',
                        'assignment' => 'Assignment',
                        'quiz' => 'Quiz',
                        'online_session' => 'Online Session / Webinar',
                    ])
                    ->required()
                    ->default('video')
                    ->reactive(),
                Forms\Components\TextInput::make('video_url')
                    ->label('Video URL')
                    ->url()
                    ->visible(fn(Forms\Get $get) => $get('type') === 'video'),
                Forms\Components\Select::make('meeting_platform')
                    ->options([
                        'Zoom' => 'Zoom',
                        'Google Meet' => 'Google Meet',
                        'Microsoft Teams' => 'Microsoft Teams',
                        'Youtube Live' => 'Youtube Live',
                        'Other' => 'Other',
                    ])
                    ->visible(fn(Forms\Get $get) => $get('type') === 'online_session')
                    ->required(fn(Forms\Get $get) => $get('type') === 'online_session')
                    ->reactive(),
                
                Forms\Components\TextInput::make('meeting_link')
                    ->label(fn(Forms\Get $get) => ($get('meeting_platform') ?? 'Meeting') . ' Link')
                    ->url()
                    ->visible(fn(Forms\Get $get) => $get('type') === 'online_session')
                    ->required(fn(Forms\Get $get) => $get('type') === 'online_session'),

                Forms\Components\FileUpload::make('file_path')
                    ->label('File')
                    ->disk('public') // Ensure visibility
                    ->directory('training-modules')
                    ->maxSize(51200) // 50MB
                    ->visible(fn(Forms\Get $get) => in_array($get('type'), ['pdf', 'assignment'])),
                
                Forms\Components\Repeater::make('questions')
                    ->label('Quiz Questions')
                    ->visible(fn(Forms\Get $get) => $get('type') === 'quiz')
                    ->schema([
                        Forms\Components\Select::make('question_type')
                            ->options([
                                'choice' => 'Multiple Choice',
                                'essay' => 'Essay',
                            ])
                            ->default('choice')
                            ->live()
                            ->required(),
                        Forms\Components\Textarea::make('question_text')
                            ->required()
                            ->label('Question'),
                        Forms\Components\Repeater::make('options')
                            ->label('Answer Options')
                            ->visible(fn(Forms\Get $get) => $get('question_type') === 'choice')
                            ->schema([
                                Forms\Components\TextInput::make('label')
                                    ->required()
                                    ->label('Option Text'),
                                Forms\Components\Toggle::make('is_correct')
                                    ->label('Correct Answer')
                                    ->default(false),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('Assessment Settings')
                    ->schema([
                        Forms\Components\TextInput::make('min_score')
                            ->label('Minimum Passing Score')
                            ->numeric()
                            ->default(70)
                            ->minValue(0)
                            ->maxValue(100)
                            ->helperText('Required score to pass this module.'),
                        Forms\Components\TextInput::make('max_attempts')
                            ->label('Maximum Attempts')
                            ->numeric()
                            ->default(3)
                            ->minValue(1)
                            ->visible(fn(Forms\Get $get) => $get('type') === 'quiz')
                            ->helperText('Number of times a student can take this quiz.'),
                    ])
                    ->columns(2)
                    ->visible(fn(Forms\Get $get) => in_array($get('type'), ['quiz', 'assignment'])),

                Forms\Components\DateTimePicker::make('scheduled_at')
                    ->label('Scheduled Date & Time')
                    ->visible(fn(Forms\Get $get) => $get('type') === 'online_session')
                    ->required(fn(Forms\Get $get) => $get('type') === 'online_session'),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(fn(\Filament\Resources\RelationManagers\RelationManager $livewire): int => $livewire->getOwnerRecord()->modules()->max('order') + 1)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
