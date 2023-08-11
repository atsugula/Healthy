<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class IndexVideos extends Component
{

    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';

    /* public function updatingSearch() {
      $this->resetPage();
    } */

    public function render()
    {
      Log::info($this->search);
      $categorias = Category::with('videos')->where('name', 'like', '%'.$this->search.'%')->paginate();

      return view('livewire.index-videos', compact('categorias'));
    }
}
