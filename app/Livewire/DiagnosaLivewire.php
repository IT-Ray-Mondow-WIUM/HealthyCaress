<?php

namespace App\Livewire;

use App\Models\IcdX;
use Livewire\Component;
use Livewire\WithPagination;

class DiagnosaLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 10; // jumlah data per halaman

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $diagnosas = IcdX::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('kode', 'like', '%' . $this->search . '%');
            })
            ->orderBy('kode', 'asc')
            ->paginate($this->perPage);

        return view('livewire.diagnosa-livewire', compact('diagnosas'));
    }
}
