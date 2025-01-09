<?php

namespace App\Enum;

enum PermissionsEnum : string
{
    case ManageUsers = 'manage_users';
    case ManageFeatures = 'manage_features';
    case ManageComments = 'manage_comments';
    case UpvoteDownvote = 'upvote_downvote';

}
