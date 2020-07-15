<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{

    use RefreshDatabase;
    /** @test */
   public  function can_create_a_post()
   {
       $this->withoutExceptionHandling();
       $response = $this->post('/posts',
           $attributes = [
               'title'=> 'cool title',
               'category'=> 2,
               'genre'=> 'cool genre',
       ]);
       $response->assertOk();
       $this->assertCount(1, Post::all());
   }

   /** @test */

   public function a_title_is_required()
   {
       $response = $this->post('/posts',
           $attributes = [
               'title'=> '',
               'category'=> 2,
               'genre'=> 'cool genre',
           ]);

       $response->assertSessionHasErrors('title');
   }


    /** @test */
    public function a_post_can_be_update()
    {
        $attirbutes = [
            'title'=> 'old title',
            'category'=> 2,
            'genre'=> 'old genre',
        ];

        $newAttirbutes = [
            'title'=> 'new title',
            'category'=> 3,
            'genre'=> 'new genre',
        ];

        $this->withoutExceptionHandling();
        $response = $this->post('/posts', $attirbutes);

        $post = Post::first();

        $this->patch('/posts/'. $post->id, $newAttirbutes);

        $this->assertEquals('new title', Post::first()->title);

    }
}
