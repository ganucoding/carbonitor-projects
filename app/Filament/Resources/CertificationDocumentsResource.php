<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificationDocumentsResource\Pages;
use App\Filament\Resources\CertificationDocumentsResource\RelationManagers;
use App\Models\CertificationDocuments;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CertificationDocumentsResource extends Resource
{
    protected static ?string $model = CertificationDocuments::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?int $navigationSort = 2;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function canCreate(): bool
    {
        return false;
    }
    protected static ?string $navigationGroup = 'Extras';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('file_path')
                    ->label(__('Upload File'))
                    ->disk('public') // Or specify another disk if needed
                    ->directory('certification-documents') // Directory within the storage disk
                    ->required()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend(time() . '-carbonitor-'),
                    )
                    ->afterStateUpdated(function ($state, Set $set) {
                        $originalFileName = $state->getClientOriginalName();
                        $set('file_name', $originalFileName);
                    })
                    ->live(onBlur: true),

                TextInput::make('file_name')
                    ->label(__('File Name'))
                    ->placeholder(__('Enter File Name'))
                    ->required()
                    ->maxLength(255),

                Select::make('folder_id')
                    ->label(__('Folder'))
                    ->placeholder(__('Select Folder'))
                    ->relationship(name: 'folder', titleAttribute: 'name')
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                    ])
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.name')
                    ->label('Project Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_path')
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
            'index' => Pages\ListCertificationDocuments::route('/'),
            'create' => Pages\CreateCertificationDocuments::route('/create'),
            'edit' => Pages\EditCertificationDocuments::route('/{record}/edit'),
        ];
    }
}
