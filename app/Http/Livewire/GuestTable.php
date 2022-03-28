<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Guest;

class GuestTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Nomor ID", "id_number")
                ->sortable()
                ->searchable(),
            Column::make("Nama", "name")
                ->sortable()
                ->searchable(),
            Column::make("Jenis Kelamin", "gender")
                ->sortable(),
            Column::make("Pekerjaan", "job")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Guest::query();
    }
}
