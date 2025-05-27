<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    public function test_authentification_need(): void
    {
        $this->get(route('me'))->assertStatus(200);
        $this->get(route('getOrders', ['id' => '0']))->assertStatus(401);
        $this->post(route('postOrders'))->assertStatus(401);
        $this->delete(route('deleteOrders', ['id' => '0']))->assertStatus(401);
        $this->patch(route('patchOrders', ['id' => '0']))->assertStatus(401);
        $this->post(route('assignRole'))->assertStatus(401);
        $this->get(route('getRoles'))->assertStatus(401);
    }
}
