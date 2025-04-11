<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = false;

    public function toArray(Request $request): array
    {

        
        return [
            
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'enabled' => $this->enabled,
            'user' => new UserResource($this->user),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'upvote_count' => $this->upvote_count ?: 0 ,
            'user_has_upvoted' => (bool)$this->user_has_upvoted,
            'user_has_downvoted' => (bool)$this->user_has_downvoted,
            'comments' => $this->comments->map(function($comment) {
                return [
                    'id' => $comment->id,
                    'comment' => $comment->comment,
                    'user' => new UserResource($comment->user),
                    'created_at' => $comment->created_at->format('Y-m-d H:i:s'),
                ];
            }),

        ];
    }
}
