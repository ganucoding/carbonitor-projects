<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IssuancesRelationManager extends RelationManager
{
    protected static string $relationship = 'issuances';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Vintage field
                TextInput::make('vintage')
                    ->label('Vintage')
                    ->nullable()
                    ->numeric()
                    ->minValue(1900)
                    ->maxLength(4) // Assuming vintage is a year (YYYY), hence maxLength 4
                    ->integer()
                    ->placeholder('Enter the vintage year'),

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

                // Issuance Date field
                DatePicker::make('issuance_date')
                    ->label('Issuance Date')
                    ->nullable()
                    ->placeholder('Select the issuance date'),

                // Project Issued To field
                TextInput::make('project_issued_to')
                    ->label('Project Issued To')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the project issued to'),

                // Serial Number field
                TextInput::make('serial_number')
                    ->label('Serial Number')
                    ->nullable()
                    ->maxLength(255)
                    ->placeholder('Enter the serial number'),

                // Status field
                Select::make('status')
                    ->label('Status')
                    ->nullable()
                    ->options([
                        'Issued' => 'Issued',
                        'Pending' => 'Pending',
                        'Cancelled' => 'Cancelled',
                        // Add other statuses as needed
                    ])
                    ->placeholder('Select status'),

                // Monitoring Period Start field
                DatePicker::make('monitoring_period_start')
                    ->label('Monitoring Period Start')
                    ->nullable()
                    ->placeholder('Select the monitoring period start date'),

                // Monitoring Period End field
                DatePicker::make('monitoring_period_end')
                    ->label('Monitoring Period End')
                    ->nullable()
                    ->placeholder('Select the monitoring period end date'),

                // Eligibilities field as a checkbox
                Checkbox::make('eligibilities_corsia_pilot_phase')
                    ->label('Eligibilities (CORSIA Pilot Phase)')
                    ->helperText('Check this box if the project is eligible for CORSIA Pilot Phase.') // Help text
                    ->default(false)
                    ->inline(),

                // Attributes field as a checkbox
                Checkbox::make('attributes_emission_reduction')
                    ->label('Attributes (Emission Reduction)')
                    ->helperText('Check this box if the project is eligible for Emission Reduction.') // Help text
                    ->default(false)
                    ->inline(),

                // Histories JSON field (using Filament's Repeater)
                Repeater::make('histories_json')
                    ->label(__('Histories'))
                    ->schema([
                        TextInput::make('credits')
                            ->label(__('Credits'))
                            ->columnSpan(3), // 3 parts
                        TextInput::make('symbol')
                            ->label(__('Symbol'))
                            ->columnSpan(1), // 1 part
                        Textarea::make('details')
                            ->label(__('Details'))
                            ->rows(1)
                            ->autosize()
                            ->columnSpan(5), // 5 parts
                    ])
                    ->columns(9) // Total parts (2 + 1 + 3)
                    ->columnSpanFull(),

                /* // History field
                Textarea::make('history')
                    ->label('History')
                    ->nullable()
                    ->rows(4)
                    ->placeholder('Enter any relevant history'), */
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('vintage')
            ->columns([
                Tables\Columns\TextColumn::make('vintage'),
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
