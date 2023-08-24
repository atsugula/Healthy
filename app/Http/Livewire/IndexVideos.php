<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class IndexVideos extends Component
{

    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
      $this->resetPage();
    }

    public function render()
    {

      $search = $this->search;

      $categorias = Category::with('videos')
          ->orWhereHas('videos', function($query) use($search){
            $query->where('titulo', 'like', '%'.$search.'%');
          })
          ->orWhere('name', 'like', '%'.$search.'%')->paginate();

      return view('livewire.index-videos', [
        'categorias' => $categorias,
        'search' => $this->search,
      ]);
    }
}
