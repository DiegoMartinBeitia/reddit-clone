<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostControllerTest extends TestCase
{
	use DatabaseMigrations;

    /**test*/
    public function a_guest_can_see_all_the_posts(){
    	//Arrange
    	$posts=factory(\App\Post::class,10)->create();
    	//Act
    	$response=$this->get(route('post_path'))
    	//Assert
    	$response->assertStatus(200);
    	foreach($posts as $post){
    		$response->assertSee($post->title);
    	}


    }
}
