<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ProcurementSearch extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
    public $category = [];

    #[Url]
    public $platform = [];

    #[Url]
    public $sort = 'latest';

    public function updated($property)
    {
        if ($property !== 'page') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Product::query();

        // Handle array or string input for category
        if (!empty($this->category)) {
            $query->whereIn('category', $this->category);
        }

        // Handle array or string input for platform
        if (!empty($this->platform)) {
            $query->where(function ($q) {
                foreach ($this->platform as $platform) {
                    $q->orWhereJsonContains('platforms', $platform);
                }
            });
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        // Sorting
        switch ($this->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = Product::distinct()->pluck('category');

        return view('livewire.procurement-search', [
            'products' => $products,
            'categories' => $categories
        ])->layout('components.layout', [
            'title' => __('messages.service_procurement_title') . ' - ' . config('app.name'),
            'description' => __('messages.service_procurement_desc')
        ]);
    }
}
