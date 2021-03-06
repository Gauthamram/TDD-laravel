<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    /** @test */
    public function a_reply_has_an_author()
    {
    	$reply = create('App\Reply');

        $this->assertInstanceOf('App\User', $reply->author);
    }
}
