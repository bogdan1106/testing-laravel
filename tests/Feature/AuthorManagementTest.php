<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    /** @test */

    use RefreshDatabase;

    public function an_author_can_be_added()
    {
        $this->post('/authors', [
            'name' => 'Ivan',
            'dob' => '01/12/1988',
        ]);

        $author = Author::all();
        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class,$author->first()->dob);
        $this->assertEquals('1988/12/01', $author->first()->dob->format('Y/d/m'));
    }

    /** @test */
    public function a_new_author_is_automatically_added()
    {

        $this->post('/books',[
            'title' => 'Tom Sayer',
            'author_id' => 'victor',
            ]);


        $book = Book::first();
        $author = Author::first();



        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all());
    }



}
