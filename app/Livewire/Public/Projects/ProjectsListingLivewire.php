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
            ->query(Project::query())
            ->columns([
                TextColumn::make('unique_id')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('projectStatus.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('projectType.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('country.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make('view')
                    ->modalContent(fn($record) => view('public.projects.show', ['project' => $record]))
                    ->slideOver()
                    ->modalWidth(MaxWidth::FiveExtraLarge),
            ])
            ->bulkActions([
                // ...
            ])
            ->recordAction('view');
    }

    public function render(): View
    {
        return view('livewire.public.projects.projects-listing-livewire');
    }
}
