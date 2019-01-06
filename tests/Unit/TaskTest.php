<?php

namespace Tests\Unit;

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

    use RefreshDatabase;

    public function testTaskModel()
    {
      // create and read data test
      $task = \App\Task::create(['task' => 'A new task', 'status' => 'doing']);
      $this->assertDatabaseHas('tasks', ['task' => 'A new task', 'status' => 'doing']);
      // update data test
      $update_task = \App\Task::find($task->id)->update(['task' => 'Updated task', 'status' => 'done']);
      $this->assertDatabaseHas('tasks', ['task' => 'Updated task', 'status' => 'done']);
      // delete data test
      \App\Task::destroy($task->id);
      $this->assertDatabaseMissing('tasks', ['task' => 'Updated task', 'status' => 'done']);
    }
}
