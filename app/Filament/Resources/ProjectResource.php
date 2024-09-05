<?php

namespace App\Filament\Resources;

use App\Enums\Country;
use App\Enums\ProjectStatus;
use App\Enums\ProjectType;
use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $formComponents = [
            TextInput::make('name')
                ->label('Project Name')
                ->required()
                ->maxLength(255),

            Select::make('status')
                ->label('Project Status')
                ->options(
                    collect(ProjectStatus::cases())->mapWithKeys(fn($case) => [
                        $case->value => $case->label(),
                    ])->toArray()
                )
                ->searchable()
                ->placeholder('Select Status'),

            Select::make('type')
                ->label('Project Type')
                ->options(
                    collect(ProjectType::cases())->mapWithKeys(fn($case) => [
                        $case->value => $case->label(),
                    ])->toArray()
                )
                ->searchable()
                ->placeholder('Select Type'),

            Select::make('country')
                ->label('Country')
                ->options(
                    collect(Country::cases())->mapWithKeys(fn($case) => [
                        $case->value => $case->label(),
                    ])->toArray()
                )
                ->searchable()
                ->placeholder('Select Country'),
        ];

        return $form
            ->schema([...$formComponents]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            //
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
