<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Todo;

class TodoTest extends TestCase
{
    public function testTodoIndex()
    {
        $response = $this->get('/todos');

        $response->assertStatus(200);
    }

    public function testTodoShow()
    {
        $todo = factory(Todo::class)->create();

        $response = $this->get("/todos/$todo->id");

        $response->assertStatus(200)
            ->assertSeeText($todo->body);
    }
}
