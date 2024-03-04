<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testInsertData(): void
    {
        $user = User::factory()->create()->toArray();
        $this->assertDatabaseHas(User::class, $user);
    }

    public function testInsertData1()
    {
        $user = User::factory()->make()->toArray();  // add email_verified_at to $fillable \:D/
        $user['password'] = Hash::make('123457');
        User::query()->create($user);
        $this->assertDatabaseHas(User::class, $user);
    }

    public function testInsertData2()
    {
        $user = User::factory()->create();
        $this->assertDatabaseCount(User::class, 1);
    }

}
