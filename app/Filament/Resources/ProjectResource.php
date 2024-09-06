<?php

namespace App\Filament\Resources;

use App\Enums\Country;
use App\Enums\ProjectStatus;
use App\Enums\ProjectType;
use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Filament\Resources\ProjectResource\RelationManagers\CertificationDocumentsRelationManager;
use App\Filament\Resources\ProjectResource\RelationManagers\IssuancesRelationManager;
use App\Filament\Resources\ProjectResource\RelationManagers\RetirementsRelationManager;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?int $navigationSort = 1;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationGroup = 'Main';

    public static function form(Form $form): Form
    {
        $formComponents = [
            Section::make(__('Project Information'))
                ->schema([
                    TextInput::make('unique_id')
                        ->label(__('Unique ID'))
                        ->placeholder(__('Enter Unique ID'))
                        ->nullable()
                        ->maxLength(255)
                        ->columnSpan(['default' => 1, 'md' => 1]),

                    Textarea::make('name')
                        ->label(__('Project Name'))
                        ->placeholder(__('Enter Project Name'))
                        ->rows(1)
                        ->autosize()
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(['default' => 1, 'md' => 3]),

                    Select::make('status')
                        ->label(__('Project Status'))
                        ->placeholder(__('Select Status'))
                        ->options(
                            collect(ProjectStatus::cases())->mapWithKeys(fn($case) => [
                                $case->value => $case->label(),
                            ])->toArray()
                        )
                        ->searchable()
                        ->columnSpan(['default' => 1, 'md' => 1]),

                    Select::make('type')
                        ->label(__('Project Type'))
                        ->placeholder(__('Select Type'))
                        ->options(
                            collect(ProjectType::cases())->mapWithKeys(fn($case) => [
                                $case->value => $case->label(),
                            ])->toArray()
                        )
                        ->searchable()
                        ->columnSpan(['default' => 1, 'md' => 2]),

                    Select::make('country')
                        ->label(__('Country'))
                        ->placeholder(__('Select Country'))
                        ->options(
                            collect(Country::cases())->mapWithKeys(fn($case) => [
                                $case->value => $case->label(),
                            ])->toArray()
                        )
                        ->searchable()
                        ->columnSpan(['default' => 1, 'md' => 1]),
                ])
                ->columns(['default' => 1, 'md' => 4]),

            Section::make(__('Project Details'))
                ->relationship('projectDetail')
                ->schema([
                    Textarea::make('project_developer')
                        ->label(__('Project Developer'))
                        ->nullable()
                        ->rows(1)
                        ->autosize()
                        ->maxLength(255)
                        ->columnSpan(1),

                    Textarea::make('methodology')
                        ->label(__('Methodology'))
                        ->nullable()
                        ->rows(1)
                        ->autosize()
                        ->columnSpan(1),

                    Textarea::make('standards_version')
                        ->label(__('Standards Version'))
                        ->nullable()
                        ->rows(1)
                        ->autosize()
                        ->maxLength(255)
                        ->columnSpan(1),

                    TextInput::make('project_scale')
                        ->label(__('Project Scale'))
                        ->nullable()
                        ->maxLength(255)
                        ->columnSpan(1),

                    TextInput::make('product')
                        ->label(__('Product'))
                        ->nullable()
                        ->maxLength(255)
                        ->columnSpan(1),

                    DatePicker::make('crediting_period_start')
                        ->label(__('Crediting Period Start'))
                        ->nullable()
                        ->columnSpan(1),

                    DatePicker::make('crediting_period_end')
                        ->label(__('Crediting Period End'))
                        ->nullable()
                        ->columnSpan(1),

                    TextInput::make('annual_estimated_credits')
                        ->label(__('Annual Estimated Credits'))
                        ->nullable()
                        ->numeric()
                        ->columnSpan(1),

                    Textarea::make('description')
                        ->label(__('Description'))
                        ->nullable()
                        ->rows(1)
                        ->autosize()
                        ->columnSpan(1),

                    Textarea::make('summary')
                        ->label(__('Summary'))
                        ->nullable()
                        ->rows(1)
                        ->autosize()
                        ->columnSpan(1),

                    Textarea::make('sources')
                        ->label(__('Sources'))
                        ->nullable()
                        ->rows(1)
                        ->autosize()
                        ->columnSpan(1),
                ])->columns(2),
        ];

        return $form
            ->schema([...$formComponents]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unique_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            IssuancesRelationManager::class,
            CertificationDocumentsRelationManager::class,
            RetirementsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
