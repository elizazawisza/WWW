<?php


namespace App\Http\Controllers;


use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $comment->login = $user->name;
        $comment->commented_section = $request->categoryID;
        $comment->comment = $request->commentText;
        $comment->save();
    }


    public function getCommentsToSection(Request $request)
    {
        $categoryID = $request->categoryID;
        $comments = Comment::where('commented_section', $categoryID)->get(['comment', 'login']);
        return response()->json(['comments' => $comments]);
    }
}