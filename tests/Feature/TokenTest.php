<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
define('LARAVEL_START', microtime(true));
class TokenTest extends TestCase
{

    public function test_get_token_command()
    {
        $this->artisan('get-token',['login'=>'karagota','password'=>'12345'])->assertExitCode(0);
    }

    /**
     * A test to store json in database.
     *
     * @return void
     */
    public function test_json_store()
    {
        $this->artisan('get-token',['login'=>'karagota','password'=>'12345']);
        $token = Artisan::output();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->post('/json/save', ["data"=>"{\"name\" : \"Sally\"}"]);
        $response->assertStatus(200);
        $id = json_decode($response->getContent())->id;
        $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->get('/admin/'.$id.'/delete');
    }

    /**
     * A test to delete json from database.
     *
     * @return void
     */
    public function test_json_delete()
    {
        $this->artisan('get-token',['login'=>'karagota','password'=>'12345']);
        $token = Artisan::output();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->post('/json/save', ["data"=>"{\"name\" : \"Sally\"}"]);
        $id = json_decode($response->getContent())->id;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->get('/admin/'.$id.'/delete');
        $response->assertStatus(302);
    }

    /**
     * A test to update json.
     *
     * @return void
     */
    public function test_json_update()
    {
        $this->artisan('get-token',['login'=>'karagota','password'=>'12345']);
        $token = Artisan::output();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->post('/json/save', ["data"=>"{\"name\" : \"Sally\"}"]);
        $id = json_decode($response->getContent())->id;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->post('/admin/'. $id .'/save', ["data"=>"{\"name\" : \"Sally2\"}"]);
        $response->assertStatus(302);
        $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->get('/admin/'.$id.'/delete');
    }


}
