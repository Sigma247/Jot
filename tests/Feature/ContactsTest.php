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
  
    public function testMustBeAnEmail()
    {
        // $this->withoutExceptionHandling();
        $response = $this->post('api/contact',array_merge($this->data(),['email' => 'Not an email']));

        $contact = Contact::first();
        $response->assertSessionHasErrors('email');
        $this->assertCount(0,Contact::all());


    }

    public function testFieldsAreRequired()
    {
        collect(['name','birthday','company','email'])->each(function($field){
            $response = $this->post('api/contact',array_merge($this->data(),[$field => '']));

        $contact = Contact::first();
        $response->assertSessionHasErrors($field);
        $this->assertCount(0,Contact::all());
        });
    }

    private function data()
    {
            return [
                'name' => 'Test Name',
                'email' => 'test@test.com',
                'birthday' => '05/14/1988',
                'company' => 'ABC Company',
            ];
    }
}
