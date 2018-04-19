<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Question;
use App\Http\Resources\ReplyResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }

    public function store(Question $question, Request $request)
    {
        $question->replies()->create($request->all());
        return response()->json(['message' => 'Created'], Response::HTTP_CREATED);
    }

    public function show(Question $question, Reply $reply)
    {
        $data = $question->replies()->where('id', $reply->id)->firstOrFail();
        return new ReplyResource($data);
    }

    public function update(Request $request, Question $question, Reply $reply)
    {
        $reply->update($request->all());
        return response()->json(['message' => 'Updated'], Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question, Reply $reply)
    {
        $question->replies()->where('id', $reply->id)->firstOrFail()->delete();
        return response()->json(['message' => 'Deleted'], Response::HTTP_NO_CONTENT);
    }
}
