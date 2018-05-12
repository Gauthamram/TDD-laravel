<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInThreadsTest extends TestCase
{
	/** @test */
	public function unauthenticated_user_cannot_add_replies()
	{
		$this->withExceptionHandling()
        	->post('/threads/1/replies', [])
        	->assertRedirect('/login');
	}

	/** @test */
	public function authenticated_user_can_add_reply_to_a_thread()
	{
		$this->be($user = create('App\User'));

		$thread = create('App\Thread');

		$reply = make('App\Reply');

		$this->post($thread->path().'/replies', $reply->toArray());

		$this->get($thread->path())
			->assertSee($reply->body);
	}
}