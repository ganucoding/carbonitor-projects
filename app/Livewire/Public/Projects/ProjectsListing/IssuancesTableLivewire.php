<?php

namespace App\Livewire\Public\Projects\ProjectsListing;

use App\Models\Issuance;
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

class IssuancesTableLivewire extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public Project $project;

    public function table(Table $table): Table
    {
        return $table
            ->query(Issuance::query()->where('project_id', $this->project->id))
            ->columns([
                TextColumn::make('vintage')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('product')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('issuance_date')
                    ->date()
                    ->sortable()
                    ->toggleable(),
            ])
            ->actions([
                ViewAction::make('viewIssuance')
                    ->modalContent(fn($record) => view('public.projects.livewire-view-issuance', ['issuance' => $record]))
                    ->modalWidth(MaxWidth::MaxContent),
            ])
            ->bulkActions([
                // ...
            ])
            ->recordAction('viewIssuance');
    }

    public function render(): View
    {
        return view('livewire.public.projects.projects-listing.issuances-table-livewire');
    }
}
