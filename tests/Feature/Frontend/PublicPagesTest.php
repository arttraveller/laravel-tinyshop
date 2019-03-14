<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{

    public function testPublicPagesAllowed()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/login')->assertStatus(200);
        $this->get('/password/reset')->assertStatus(200);
        $this->get('/register')->assertStatus(200);
    }

}
