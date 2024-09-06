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
use Filament\Forms\Components\Select;
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
            TextInput::make('unique_id')
                ->label('Unique ID')
                ->placeholder('Enter Unique ID')
                ->nullable()
                ->maxLength(255),

            TextInput::make('name')
                ->label('Project Name')
                ->placeholder('Enter Project Name')
                ->required()
                ->maxLength(255),

            Select::make('status')
                ->label('Project Status')
                ->placeholder('Select Status')
                ->options(
                    collect(ProjectStatus::cases())->mapWithKeys(fn($case) => [
                        $case->value => $case->label(),
                    ])->toArray()
                )
                ->searchable(),

            Select::make('type')
                ->label('Project Type')
                ->placeholder('Select Type')
                ->options(
                    collect(ProjectType::cases())->mapWithKeys(fn($case) => [
                        $case->value => $case->label(),
                    ])->toArray()
                )
                ->searchable(),

            Select::make('country')
                ->label('Country')
                ->placeholder('Select Country')
                ->options(
                    collect(Country::cases())->mapWithKeys(fn($case) => [
                        $case->value => $case->label(),
                    ])->toArray()
                )
                ->searchable(),
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
