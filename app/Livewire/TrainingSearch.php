<?php

namespace App\Livewire;

use App\Models\Training;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class TrainingSearch extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
    public $category = []; // For filtering webinar vs class (though usually set by route)

    #[Url]
    public $type = []; // online/offline

    #[Url]
    public $sort = 'latest';

    #[Url]
    public $level = []; // beginner, intermediate, expert (for classes)

    public $forcedCategory = null; // To force context (webinar only or class only) if needed

    public function mount($category = null)
    {
        if ($category) {
            $this->forcedCategory = $category;
            $this->category = [$category];
        }
    }

    public function updated($property)
    {
        if ($property !== 'page') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Training::where('is_active', true);

        // Filter by Category
        if ($this->forcedCategory) {
            $query->where('category', $this->forcedCategory);
        } elseif (!empty($this->category)) {
            $query->whereIn('category', $this->category);
        }

        // Filter by Type (Online/Offline) or Level (Beginner/Expert)
        if ($this->forcedCategory === 'class') {
            if (!empty($this->level)) {
                $query->whereIn('level', $this->level);
            }
        } else {
             if (!empty($this->type)) {
                $query->whereIn('type', $this->type);
            }
        }

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        // Sorting
        switch ($this->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'upcoming':
                $query->orderBy('event_date', 'asc');
                break;
            default:
                $query->orderBy('event_date', 'asc'); // Default nearest event
                break;
        }

        $trainings = $query->paginate(16)->withQueryString();

        return view('livewire.training-search', [
            'trainings' => $trainings,
        ])->layout('components.layout-upventure', [
            'title' => ($this->forcedCategory === 'class' ? __('messages.class_title') : __('messages.training_schedule_title')) . ' - UpVenture',
        ]);
    }
}
