<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Question;

class Questions extends Component
{
    public $type;
    public $page;
    public $perPage;

    public function mount($page, $perPage, $type)
    {
        $this->type = $type;
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }

    public function paginate($items, $options = [])
    {
        $page = $this->page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $this->perPage), $items->count(), $this->perPage, $page, $options);
    }
    
    public function render()
    {
        if ($this->type === 'questions.newest') {
            $questions = Question::latest()
                ->get();
        } elseif ($this->type === 'questions.unanswered') {
            $questions = Question::doesntHave('answer')
                ->latest()
                ->get();
        } elseif ($this->type === 'questions.popular') {
            $questions = Question::has('answer')
                ->get()
                ->sortByDesc(function($question)
                {
                    return $question->answer->count();
                });
        }
        return view('livewire.questions.questions', [
            'questions' => $this->paginate($questions),
            'page' => $this->page,
        ]);
    }
}
