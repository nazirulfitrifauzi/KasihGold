<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function delete($id)
    {
        Announcement::whereId($id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
