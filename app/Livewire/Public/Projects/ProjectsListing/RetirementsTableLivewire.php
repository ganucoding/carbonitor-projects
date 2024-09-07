<?php

namespace App\Livewire\Public\Projects\ProjectsListing;

use App\Models\Retirement;
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

class RetirementsTableLivewire extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Retirement::query())
            ->columns([
                TextColumn::make('date')
                    ->dateTime()
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('vintage')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('serial_number')
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
                TextColumn::make('retirementStatus.name')
                    ->label('Status')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('note')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
            ])
            ->actions([
                ViewAction::make('viewRetirement')
                    ->modalContent(fn($record) => view('public.projects.livewire-view-retirement', ['retirement' => $record]))
                    ->modalWidth(MaxWidth::MaxContent),
            ])
            ->bulkActions([
                // ...
            ])
            ->recordAction('viewRetirement');
    }

    public function render(): View
    {
        return view('livewire.public.projects.projects-listing.retirements-table-livewire');
    }
}
