<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Mail\CommentStatusUpdated;
use App\Models\Comment;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?int $navigationSort = 2;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function canCreate(): bool
    {
        return false;
    }
    protected static ?string $navigationGroup = 'Main';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('project_id')
                    ->label(__('Project Name'))
                    ->placeholder(__('Select Project'))
                    ->relationship(name: 'project', titleAttribute: 'name')
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                    ])
                    ->searchable()
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('username')
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\Textarea::make('comment')
                    ->rows(3)
                    ->autosize()
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->disabled(fn($record) => in_array($record->status, ['approved', 'rejected'])),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.name')
                    ->label('Project Name')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
                    ->formatStateUsing(function ($state) {
                        return $state ? ucwords($state) : 'N/A';
                    }),
                Tables\Columns\TextColumn::make('status_updated_by')
                    ->label('Status Updated By')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return $state ? User::find($state)->name : 'N/A';
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Comment Created At')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Status Updated At')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->modalHeading('Approve Comment')
                    ->modalDescription('Are you sure you want to approve this comment? This action cannot be undone, and the user will be notified via email.')
                    ->modalSubmitActionLabel('Yes, approve and notify via email')
                    ->action(function (Comment $record) {
                        $record->update([
                            'status' => 'approved',
                            'status_updated_by' => auth()->user()->id,
                        ]);

                        Mail::to($record->email)->send(new CommentStatusUpdated($record)); // Send email to commenter's email
                    }),
                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation()
                    ->modalHeading('Reject Comment')
                    ->modalDescription('Are you sure you want to reject this comment? This action cannot be undone, and the user will be notified via email.')
                    ->modalSubmitActionLabel('Yes, reject and notify via email')
                    ->action(function (Comment $record) {
                        $record->update([
                            'status' => 'rejected',
                            'status_updated_by' => auth()->user()->id,
                        ]);

                        Mail::to($record->email)->send(new CommentStatusUpdated($record)); // Send email to commenter's email
                    }),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
