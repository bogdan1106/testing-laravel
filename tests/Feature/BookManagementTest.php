<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookManagementTest extends TestCase
{
use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
       $responce = $this->post('/books', [
            'title' => 'Cool Book Title',
            'author_id' => 'Victor',
        ]);

       $book = Book::first();
        $this->assertCount(1, Book::all());
        $responce->assertRedirect('/book');
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/books', [
            'title' => '',
            'author_id' => 'Victor',
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_author_is_required()
    {

        $response = $this->post('/books', array_merge($this->data(), ['author_id' => '']));

        $response->assertSessionHasErrors('author_id');
    }


    /** @test */

    public function a_book_can_be_updated()
    {
        $attributes = $this->data();
        $newAttributes = [
            'title' => 'new title',
            'author_id' => 2,
        ];

        $this->withoutExceptionHandling();
        $response = $this->post('/books', $attributes);


        $book = Book::first();

        $this->patch( '/books/' . $book->id, $newAttributes);

        $this->assertEquals('new title', Book::first()->title);
        $this->assertEquals(2, Book::first()->author_id);
    }

    /** @test */
    public function a_book_can_be_deleted()
    {
        $attributes = $this->data();

        $response = $this->post('/books', $attributes);

        $book = Book::first();

        $this->assertCount(1, Book::all());

       $response = $this->delete('/books/'. $book->id);
//
        $this->assertCount(0, Book::all());

    }

    /**
     * @return array
     */
    public function data(): array
    {
        return [
            'title' => 'title',
            'author_id' => 'Author',
        ];
    }
}

