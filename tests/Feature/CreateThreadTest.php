<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
	/** @test */
	public function a_guest_can_not_create_thread()
	{
		$this->withExceptionHandling();

        $this->post('/threads', [])
            ->assertRedirect('/login');
        $this->get('/threads/create')
            ->assertRedirect('/login');
	}
    /** @test */
    public function an_authenticated_user_can_publish_thread()
    {
    	$this->actingAs(create('App\User'));

    	$thread = make('App\Thread');
    	$this->post('/threads', $thread->toArray());

    	$this->get($thread->path())
    		->assertSee($thread->title)
    		->assertSee($thread->body);
    }
}
