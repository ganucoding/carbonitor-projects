<?php

namespace App\Livewire\Public\Projects;

use App\Models\Project;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProjectsListingLivewire extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Project::query()->where('is_visible', true))
            ->columns([
                TextColumn::make('unique_id')
                    ->label(__('ID'))
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('projectStatus.name')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('projectType.name')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('country.name')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                /* TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), */
            ])
            ->filters([
                SelectFilter::make('projectStatus')
                    ->relationship('projectStatus', 'name')
                    ->preload()
                    ->multiple(),
                SelectFilter::make('projectType')
                    ->relationship('projectType', 'name')
                    ->preload()
                    ->multiple(),
                SelectFilter::make('country')
                    ->relationship('country', 'name')
                    ->preload()
                    ->multiple()
                    ->searchable(),
            ])
            ->actions([
                ViewAction::make('viewProjectDetail')
                    ->modalContent(fn($record) => view('public.projects.show', ['project' => $record]))
                    ->modalWidth(MaxWidth::MaxContent),
                ViewAction::make('viewCommentsSection')
                    ->label('Comment')
                    ->modalContent(fn($record) => view('public.projects.livewire-comments-section', ['project' => $record]))
                    ->modalWidth(MaxWidth::MaxContent)
                    ->icon('heroicon-m-chat-bubble-oval-left-ellipsis'),
            ])
            ->bulkActions([
                // ...
            ])
            ->recordAction('viewProjectDetail');
    }

    public function render(): View
    {
        return view('livewire.public.projects.projects-listing-livewire');
    }
}
