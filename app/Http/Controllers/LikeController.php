<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }

    public function store(Reply $reply)
    {
        $reply->likes()->create([
            'user_id' => 1
        ]);
        return response()->json(['message' => 'Created'], Response::HTTP_CREATED);
    }

    public function destroy(Reply $reply)
    {
        $reply->likes()->where('user_id', 1)->first()->delete();
        return response()->json(['message' => 'Deleted'], Response::HTTP_NO_CONTENT);
    }
}
