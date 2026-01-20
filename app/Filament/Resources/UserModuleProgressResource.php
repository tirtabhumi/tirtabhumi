<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserModuleProgressResource\Pages;
use App\Filament\Resources\UserModuleProgressResource\RelationManagers;
use App\Models\UserModuleProgress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserModuleProgressResource extends Resource
{
    protected static ?string $model = UserModuleProgress::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationLabel = 'Penilaian Tugas';

    protected static ?string $modelLabel = 'Penilaian Tugas';

    protected static ?string $pluralModelLabel = 'Penilaian Tugas';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen UpVenture';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Siswa & Modul')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->disabled()
                            ->label('Siswa'),
                        Forms\Components\Select::make('training_module_id')
                            ->relationship('trainingModule', 'title')
                            ->disabled()
                            ->label('Modul'),
                    ])->columns(2),

                Forms\Components\Section::make('Isi Tugas / Submission')
                    ->schema([
                        Forms\Components\Placeholder::make('submission_meta')
                            ->label('Detail Pengumpulan')
                            ->content(fn($record) => $record ? "Dikumpulkan oleh {$record->user->name} pada " . $record->updated_at->format('d M Y, H:i') : '-'),

                        Forms\Components\Placeholder::make('image_preview')
                            ->label('Pratinjau Gambar')
                            ->content(fn($record) => $record && $record->submission_file ? view('filament.forms.components.assignment-preview', ['state' => $record->submission_file]) : 'Tidak ada pratinjau gambar')
                            ->visible(fn($record) => $record && $record->submission_file && (function ($file) {
                                // Extract first string if array
                                $target = is_array($file) ? ($file[0] ?? reset($file)) : $file;
                                if (!is_string($target))
                                    return false;
                                $ext = strtolower(pathinfo($target, PATHINFO_EXTENSION));
                                return in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'webp']);
                            })($record->submission_file)),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('submission_text')
                                    ->label('Tautan / URL Tugas')
                                    ->url()
                                    ->readOnly()
                                    ->suffixAction(
                                        Forms\Components\Actions\Action::make('open_link')
                                            ->icon('heroicon-m-arrow-top-right-on-square')
                                            ->url(fn($state) => $state)
                                            ->openUrlInNewTab()
                                            ->visible(fn($state) => filled($state))
                                    ),
                                Forms\Components\FileUpload::make('submission_file')
                                    ->label('Unduh Berkas')
                                    ->disk('public')
                                    ->visibility('public')
                                    ->multiple() // Support array storage format
                                    ->disabled()
                                    ->openable()
                                    ->downloadable()
                                    ->previewable(false),
                            ]),
                    ]),

                Forms\Components\Section::make('Jawaban Kuis')
                    ->schema([
                        Forms\Components\Placeholder::make('answers_display')
                            ->label('')
                            ->content(fn($record) => $record && $record->quiz_answers ? view('filament.forms.components.quiz-answers-preview', ['answers' => $record->quiz_answers, 'questions' => $record->trainingModule->questions]) : 'Jawaban tidak tersedia'),
                    ])
                    ->visible(fn($record) => $record && $record->quiz_answers && count($record->quiz_answers) > 0),

                Forms\Components\Section::make('Penilaian')
                    ->schema([
                        Forms\Components\Placeholder::make('passing_requirement')
                            ->label('Syarat Kelulusan')
                            ->content(fn($record) => $record?->trainingModule?->min_score ? "Skor Minimum: {$record->trainingModule->min_score}" : 'Tidak ada skor minimum'),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('score')
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->label('Skor / Nilai')
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Forms\Set $set, $record) {
                                        if (!$record || !$record->trainingModule)
                                            return;

                                        $minScore = $record->trainingModule->min_score ?? 70;
                                        $set('status', 'graded');
                                        if ($state >= $minScore) {
                                            $set('is_completed', true);
                                            $set('completed_at', now());
                                        } else {
                                            $set('is_completed', false);
                                            $set('completed_at', null);
                                        }
                                    }),
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'Menunggu Penilaian' => 'Menunggu Penilaian',
                                        'graded' => 'Sudah Dinilai',
                                    ])
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Forms\Set $set, $get, $record) {
                                        if ($state === 'graded' && $record && $record->trainingModule) {
                                            $score = $get('score') ?? 0;
                                            $minScore = $record->trainingModule->min_score ?? 70;
                                            if ($score >= $minScore) {
                                                $set('is_completed', true);
                                                $set('completed_at', now());
                                            } else {
                                                $set('is_completed', false);
                                                $set('completed_at', null);
                                            }
                                        } elseif ($state === 'Menunggu Penilaian') {
                                            $set('is_completed', false);
                                            $set('completed_at', null);
                                        }
                                    }),
                                Forms\Components\Hidden::make('is_completed'),
                                Forms\Components\Hidden::make('completed_at'),
                            ]),
                        Forms\Components\Textarea::make('mentor_feedback')
                            ->label('Feedback / Komentar Mentor')
                            ->placeholder('Berikan masukan kepada siswa mengenai tugas mereka...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->whereNotNull('status')->where('status', '!=', 'started'))
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Siswa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trainingModule.title')
                    ->label('Modul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trainingModule.type')
                    ->label('Tipe')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(?string $state): string => match ($state) {
                        'Menunggu Penilaian' => 'warning',
                        'graded' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('score')
                    ->label('Nilai')
                    ->sortable()
                    ->placeholder('-'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dikumpulkan')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Menunggu Penilaian' => 'Menunggu Penilaian',
                        'graded' => 'Sudah Dinilai',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Nilai'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if ($user->hasAnyRole(['super_admin', 'admin'])) {
            return $query;
        }

        return $query->whereHas('trainingModule.training', function ($q) use ($user) {
            $q->where(function ($sq) use ($user) {
                // Own trainings
                $sq->where('user_id', $user->id);

                // OR trainings from same organization
                if ($user->organization_id) {
                    $sq->orWhereHas('partner', function ($pq) use ($user) {
                        $pq->where('organization_id', $user->organization_id);
                    });
                }
            });
        });
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserModuleProgress::route('/'),
            'create' => Pages\CreateUserModuleProgress::route('/create'),
            'edit' => Pages\EditUserModuleProgress::route('/{record}/edit'),
        ];
    }
}
