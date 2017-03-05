<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;

use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function feed()
    {
        $friends = Auth::user()->friends();

        $feed = array();

        foreach ($friends as $friend) {
            foreach ($friend->posts as $post) {
                array_push($feed, $post);
            }
        }

        foreach (Auth::user()->posts as $post) {
            array_push($feed, $post);
        }

        usort($feed, function($p1, $p2){
            return $p1->created_at < $p2->created_at;
        });

        return $feed;
    }
}
