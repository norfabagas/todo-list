<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetTaskIndex()
    {
        $response = $this->get('tasks');
        $response->assertStatus(200)
          ->assertViewIs('tasks.index')
          ->assertSeeText('To Do List App');
    }

    public function testGetTaskCreate()
    {
        $response = $this->get('tasks/create');
        $response->assertStatus(200)
          ->assertViewIs('tasks.create')
          ->assertSeeText('New Task', 'submit', url('tasks'));
    }

    public function testGetTaskEdit()
    {
        $task = \App\Task::create(['task' => 'A new task', 'status' => 'doing']);
        $response = $this->get('tasks/' . $task->id . '/edit');
        $response->assertStatus(200);
    }

    public function testGetTaskDelete()
    {
        $task = \App\Task::create(['task' => 'New task', 'status' => 'doing']);
        $response = $this->delete('tasks/' . $task->id);
        $response->assertRedirect('tasks');
    }

    use RefreshDatabase;
}
