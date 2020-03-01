<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Models\Todolist;
use App\Models\Todo;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { factory(User::class, 50)
        ->create()->each(
            function($user) {
                factory(TodoList::class, 10) 
                ->create(['user_id' => $user->id])->each(
                    function($list){
                        factory(Todo::class, 10)
                        ->create([
                            "list_id" =>$list->id
                        ]);
                    });
            });
        }
    }
