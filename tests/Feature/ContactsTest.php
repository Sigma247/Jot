<?php

namespace Tests\Feature;

use App\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
  
    public function testAddContact()
    {
        $this->withoutExceptionHandling();
        $this->post('api/contact',['name' => 'Test Name']);

        $this->assertCount(1,Contact::all());
    }
}
