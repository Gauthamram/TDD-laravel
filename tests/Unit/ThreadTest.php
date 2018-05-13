<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
	protected $thread;

	public function setUp()
	{
		parent::setUp();
		$this->thread = create('App\Thread');
	}

	/** @test */
    public function a_thread_has_replies()
    {
		$this->assertInstanceOf(
			'Illuminate\Database\Eloquent\Collection', $this->thread->replies
		);
    }

    /** @test */
    public function a_thread_has_a_string_path()
    {
    	$thread = create('App\Thread');
		$this->assertEquals(
			"/threads/{$thread->channel->slug}/{$thread->id}", $thread->path()
		);
    }

    /** @test */
    public function a_thread_has_an_author()
    {
		$this->assertInstanceOf(
			'App\User', $this->thread->author
		);
    }

    /** @test */
    public function a_thread_belongs_to_a_channel()
    {
    	$this->assertInstanceOf('App\Channel', $this->thread->channel);
    }
}
