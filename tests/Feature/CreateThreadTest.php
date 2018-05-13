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
    	$response = $this->post('/threads', $thread->toArray());

    	$this->get($response->headers->get('Location'))
    		->assertSee($thread->title)
    		->assertSee($thread->body);
    }

    /** @test */
    public function a_thread_submit_request_must_have_title()
    {
        $this->publishThread(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_thread_submit_request_must_have_body()
    {
        $this->publishThread(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_thread_submit_request_must_have_channel_id()
    {
        factory('App\Channel', 2)->create();

        $this->publishThread(['channel_id' => null])
            ->assertSessionHasErrors('channel_id');
        $this->publishThread(['channel_id' => 999])
            ->assertSessionHasErrors('channel_id');
    }

    public function publishThread($override)
    {
        $this->withExceptionHandling()->actingAs(create('App\User'));

        $thread = make('App\Thread',$override);
        return $this->post('/threads', $thread->toArray());
    }
}
