<?php

namespace Tests\Feature;

use App\Book;
use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
 use RefreshDatabase;



   /** @test */
    public function a_project_can_be_added()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/projects', [
            'title' => 'pr-title',
            'desc' => 'description',
        ]);

        $response->assertOk();
       $this->assertCount(1, Project::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/projects', [
            'title' => '',
            'desc' => 'my desc',
        ]);

        $response->assertSessionHasErrors('title');
    }

        /** @test */
    public function a_desc_is_required()
    {
        $response = $this->post('/projects', [
            'title' => 'sobaka',
            'desc' => '',
        ]);
        $response->assertSessionHasErrors('desc');
    }


    /** @test */
    public function a_project_can_be_updated()
    {
        $attributes = [
            'title' => 'title',
            'desc' => 'desc',
        ];
        $newAttributes = [
            'title' => 'new title',
            'desc' => 'new desc',
        ];

        $this->withoutExceptionHandling();
        $response = $this->post('/projects', $attributes);

        $project = Project::first();

        $this->patch( '/projects/' . $project->id, $newAttributes);
        $this->assertEquals('new title', Project::first()->title);



    }
}
