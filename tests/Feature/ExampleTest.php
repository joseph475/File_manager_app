<?php

namespace Tests\Feature;

use App\Models\File_Masterlist;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class ExampleTest extends TestCase
{
   

    // public function testBasicTest()
    // {
    //     $this->assertTrue(true);
    // }
    public function test_dashboard_view(){
        $view = $this->view('dashboard', ['name' => 'Taylor']);
        $view->assertSee('Taylor');
    }
    public function test_uploads_view(){
        $view = $this->view('upload', ['name' => 'Taylor']);
        $view->assertSee('Taylor');
    }
    public function test_welcome_view(){
        $view = $this->view('welcome', ['name' => 'Taylor']);
        $view->assertSee('Taylor');
    }

    public function testUploadFile()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/avatar', [
            'avatar' => $file,
        ]);

 
        // Storage::disk('public_uploads')->assertExists('file/' . $response->hashName());
    }
}
