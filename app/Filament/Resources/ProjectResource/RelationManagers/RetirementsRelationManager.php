<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RetirementsRelationManager extends RelationManager
{
    protected static string $relationship = 'retirements';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Date field
                DatePicker::make('date')
                    ->label('Date')
                    ->nullable()
                    ->placeholder('Select the date'),

                // Vintage field
                TextInput::make('vintage')
                    ->label('Vintage')
                    ->nullable()
                    ->numeric()
                    ->minValue(1900)
                    ->maxLength(4) // Assuming vintage is a year (YYYY), hence maxLength 4
                    ->integer()
                    ->placeholder('Enter the vintage year'),

                // Serial Number field
                TextInput::make('serial_number')
                    ->label('Serial Number')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the serial number'),

                // Quantity field
                TextInput::make('quantity')
                    ->label('Quantity')
                    ->nullable()
                    ->numeric()
                    ->minValue(0)
                    ->placeholder('Enter the quantity'),

                // Product field
                TextInput::make('product')
                    ->label('Product')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the product'),

                // Status field
                Select::make('retirement_status_id')
                    ->label(__('Retirement Status'))
                    ->placeholder(__('Select Status'))
                    ->relationship(name: 'retirementStatus', titleAttribute: 'name')
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                    ])
                    ->searchable(),

                // Note field
                Textarea::make('note')
                    ->label('Note')
                    ->nullable()
                    ->rows(4)
                    ->placeholder('Enter any additional notes'),

                // Using Entity field
                TextInput::make('using_entity')
                    ->label('Using Entity')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the using entity'),

                // Use Case field
                TextInput::make('use_case')
                    ->label('Use Case')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the use case'),

                // Use Case Authorisation field
                TextInput::make('use_case_authorisation')
                    ->label('Use Case Authorisation')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the use case authorisation'),

                // Corresponding Adjustment field
                TextInput::make('corresponding_adjustment')
                    ->label('Corresponding Adjustment')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the corresponding adjustment'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date')
            ->columns([
                Tables\Columns\TextColumn::make('date'),
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
