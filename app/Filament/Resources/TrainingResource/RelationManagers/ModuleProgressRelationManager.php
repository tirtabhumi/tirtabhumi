<?php

namespace App\Filament\Resources\TrainingResource\RelationManagers;

use App\Models\UserModuleProgress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class ModuleProgressRelationManager extends RelationManager
{
    protected static string $relationship = 'registrations';

    protected static ?string $title = 'Module Progress';

    protected static ?string $modelLabel = 'Student Progress';

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'completed'))
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Student Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('progress_percentage')
                    ->label('Overall Progress')
                    ->state(function ($record) {
                        $user = $record->user;
                        if (!$user) return '0%';
                        
                        $totalModules = $record->training->modules->count();
                        if ($totalModules === 0) return '0%';
                        
                        $completedModules = UserModuleProgress::where('user_id', $user->id)
                            ->whereIn('training_module_id', $record->training->modules->pluck('id'))
                            ->where('is_completed', true)
                            ->count();
                            
                        return round(($completedModules / $totalModules) * 100) . '%';
                    })
                    ->badge()
                    ->color(fn ($state) => $state === '100%' ? 'success' : 'warning'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('has_pending_review')
                    ->label('Has Pending Assignments')
                    ->queries(
                        true: fn (Builder $query) => $query->whereHas('user.moduleProgress', fn (Builder $q) => $q->where('status', 'Menunggu Penilaian')),
                        false: fn (Builder $query) => $query->whereDoesntHave('user.moduleProgress', fn (Builder $q) => $q->where('status', 'Menunggu Penilaian')),
                    ),
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('view_progress')
                    ->label('View Progress')
                    ->icon('heroicon-o-academic-cap')
                    ->color('info')
                    ->slideOver()
                    ->modalHeading(fn ($record) => "Module-by-Module Progress for {$record->name}")
                    ->form(function ($record) {
                        $user = $record->user;
                        if (!$user) {
                            return [
                                Forms\Components\Placeholder::make('no_user')
                                    ->content('User account not found for this email address.')
                            ];
                        }

                        $modules = $record->training->modules;
                        $userProgressRecords = UserModuleProgress::where('user_id', $user->id)
                            ->whereIn('training_module_id', $modules->pluck('id'))
                            ->get()
                            ->keyBy('training_module_id');

                        $progressData = $modules->map(function ($module) use ($userProgressRecords) {
                            $p = $userProgressRecords->get($module->id);
                            return [
                                'module_name' => $module->title,
                                'type' => ucfirst($module->type),
                                'status' => $p ? ($p->status ?? ($p->is_completed ? 'Completed' : 'Started')) : 'Not Started',
                                'score' => $p ? ($p->score ?? 'N/A') : 'N/A',
                                'mentor_feedback' => $p ? ($p->mentor_feedback ?? '') : '',
                                'progress_id' => $p ? $p->id : null,
                            ];
                        });

                        return [
                            Forms\Components\Repeater::make('modules_list')
                                ->label('Modules')
                                ->schema([
                                    Forms\Components\Grid::make(4)
                                        ->schema([
                                            Forms\Components\TextInput::make('module_name')
                                                ->label('Module')
                                                ->disabled(),
                                            Forms\Components\TextInput::make('type')
                                                ->label('Type')
                                                ->disabled(),
                                            Forms\Components\TextInput::make('status')
                                                ->label('Status')
                                                ->disabled(),
                                            Forms\Components\TextInput::make('score')
                                                ->label('Score')
                                                ->disabled(),
                                        ]),
                                    Forms\Components\Textarea::make('mentor_feedback')
                                        ->label('Mentor Feedback')
                                        ->placeholder('Provide feedback...')
                                        ->rows(2)
                                        ->dehydrateStateUsing(fn ($state) => $state),
                                    Forms\Components\Placeholder::make('grading_link')
                                        ->label('')
                                        ->content(fn ($get) => new HtmlString("<a href='/admin/user-module-progresses/{$get('progress_id')}/edit' target='_blank' class='text-indigo-600 font-bold hover:underline'>Full Grading Panel →</a>"))
                                        ->visible(fn ($get) => $get('progress_id') !== null),
                                ])
                                ->default($progressData->toArray())
                                ->addable(false)
                                ->deletable(false)
                                ->reorderable(false)
                                ->columnSpanFull(),
                        ];
                    }),
            ])
            ->bulkActions([
                //
            ]);
    }
}
