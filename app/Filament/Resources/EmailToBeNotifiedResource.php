<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailToBeNotifiedResource\Pages;
use App\Filament\Resources\EmailToBeNotifiedResource\RelationManagers;
use App\Models\EmailToBeNotified;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmailToBeNotifiedResource extends Resource
{
    protected static ?string $model = EmailToBeNotified::class;

    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';
    protected static ?int $navigationSort = 4;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationGroup = 'Main';
    protected static ?string $navigationLabel = 'Emails To Be Notified';
    protected static ?string $pluralModelLabel = 'Emails To Be Notified';
    protected static ?string $slug = 'emails-to-be-notified';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            'index' => Pages\ListEmailToBeNotifieds::route('/'),
            'create' => Pages\CreateEmailToBeNotified::route('/create'),
            'edit' => Pages\EditEmailToBeNotified::route('/{record}/edit'),
        ];
    }
}
