<?php

namespace App\Http\Livewire\Tasks;

use App\Gamify\Points\TaskCreated;
use App\Product;
use App\Task;
use Auth;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTask extends Component
{
    use WithFileUploads;

    public $task;
    public $image;

    public function getProductIDFromHashtag($string)
    {
        $hashtags = false;
        preg_match_all("/(#\w+)/u", $string, $matches);
        if ($matches) {
            $hashtagsArray = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsArray);
        }
        if (count($hashtags) > 0) {
            $slug = str_replace('#', '', $hashtags[0]);
            $product = Product::where('slug', $slug)->get();

            if (count($product) > 0) {
                return $product[0]->id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function search($array, $key, $value)
    {
        $results = [];

        if (is_array($array)) {
            if (isset($array[$key]) && strtolower($array[$key]) == $value) {
                $results[] = $array;
            }

            foreach ($array as $subarray) {
                $results = array_merge($results, $this->search($subarray, $key, $value));
            }
        }

        return $results;
    }

    public function updatedImage()
    {
        if (Auth::check()) {
            $this->validate([
                'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            ]);
        } else {
            return session()->flash('error', 'Forbidden!');
        }
    }

    public function submit()
    {
        if (Auth::check()) {
            $validatedData = $this->validate([
                'task' => 'required|profanity',
                'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            ],
            [
                'task.profanity' => 'Please check your words!',
            ]);

            if (Auth::user()->isFlagged) {
                return session()->flash('error', 'Your account is flagged!');
            }

            $check_time = Auth::user()->tasks()
                ->select('task', 'created_at')
                ->where('created_at', '>', Carbon::now()->subMinutes(3)->toDateTimeString())
                ->latest()->get()->toArray();
            if (count($this->search($check_time, 'task', strtolower($this->task))) > 0) {
                return session()->flash('error', 'Your already posted this task, wait for sometime!');
            }

            $product = $this->getProductIDFromHashtag($this->task);

            if ($product) {
                $type = 'product';
                $product_id = $product;
            } else {
                $type = 'user';
                $product_id = null;
            }

            if ($this->image) {
                $image = $this->image->store('photos');
            } else {
                $image = null;
            }

            $task = Task::create([
                'user_id' =>  Auth::user()->id,
                'product_id' =>  $product_id,
                'task' => $this->task,
                'done' => false,
                'image' => $image,
                'type' => $type,
            ]);

            $this->emit('taskAdded');
            $this->reset();
            Auth::user()->givePoint(new TaskCreated($task));

            return session()->flash('success', 'Task has been created!');
        } else {
            return session()->flash('error', 'Forbidden!');
        }
    }

    public function render()
    {
        return view('livewire.tasks.create-task');
    }
}