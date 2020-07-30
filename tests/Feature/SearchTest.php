<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire;
use App\Http\Livewire\Search;
use App\Task;

class SearchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search()
    {
        Task::create([
            'user_id' => 1,
            'task' => 'Test Search',
            'done' => true,
        ]);
        Livewire::test(Search::class)
            ->set('query', 'Test Search')
            ->assertSee('Test Search')
            ->set('query', '')
            ->assertDontSee('Test Search');
    }
}
