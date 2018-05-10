<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInThreadsTest extends TestCase
{
	/** @test */
	public function unauthenticated_user_cannot_add_replies()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/threads/1/replies', []);
	}

	/** @test */
	public function authenticated_user_can_add_reply_to_a_thread()
	{
		$this->be($user = factory('App\User')->create());

		$thread = factory('App\Thread')->create();

		$reply = factory('App\Reply')->make();

		$this->post($thread->path().'/replies', $reply->toArray());

		$this->get($thread->path())
			->assertSee($reply->body);
	}
}