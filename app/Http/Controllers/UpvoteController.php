<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Support\Facades\Auth;
use App\Models\Upvote;
use Illuminate\Http\Request;

class UpvoteController extends Controller
{
    public function store(Request $request, Feature $feature)
    {
        $data = $request->validate([
            // 'feature_id' => ['required', 'exists:features,id'],
            'upvote' => ['required', 'boolean'],
        ]);

        Upvote::updateOrCreate(
            ['feature_id' => $feature->id/*$data['feature_id']*/, 'user_id' => Auth::id()],
            ['upvote' => $data['upvote']]
        );

        return back();
    }

    public function destroy(Feature $feature)
    {
        $feature->upvote()->where('user_id', Auth::id())->delete();

        return back();
    }
}
