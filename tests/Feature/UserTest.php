<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user status changes in deleting event', function () {
    $user = User::factory()->create();

    $user->delete();

    $user->refresh();

    $this->assertEquals('deleted', $user->status);
});

test('user status changes in restoring event', function () {
    $user = User::factory()->create();

    $user->delete();

    $user->restore();

    $user->refresh();

    $this->assertEquals('restored', $user->status);
});
