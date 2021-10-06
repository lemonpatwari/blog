<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modelId;
    public $search = '';

    public function deleteShowModal($id)
    {
        $this->modelId = null;
        $this->modelId = $id;
        $this->modalFormVisible = true;
    }

    public function index(): object
    {
        return \App\Models\Blog::with('user', 'categories', 'tags')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('slug', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->paginate(10);
    }

    public function deleteBlog()
    {
        \App\Models\Blog::destroy($this->modelId);
        $this->modalFormVisible = false;

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Blog has been deleted successful.'
        ]);
    }

    public function render()
    {
        return view('livewire.blog', [
            'blogs' => $this->index(),
        ]);
    }
}
