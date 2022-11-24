<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\NewComment;


class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $product->comments()->create([
            'body'=>$request->body,
            'commented_by' => Auth::id(),
        ]);

        $user = User::where('email', 'azazahmed623@gmail.com')->first();
        Notification::send($user, new NewComment($product));

        
        return redirect()->back();

    }
}
