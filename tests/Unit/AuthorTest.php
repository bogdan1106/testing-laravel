<?php

namespace Tests\Unit;

use App\Author;
use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
    /**     @test      */
    public function a_date_of_birth_is_nullable()
    {
        Author::firstOrCreate([
            'name' => 'John doe',
        ]);

        $this->assertCount(1, Author::all());
    }
}
