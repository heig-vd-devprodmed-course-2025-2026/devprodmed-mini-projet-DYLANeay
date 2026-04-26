<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiReportController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            "reason" => "nullable|string|max:255",
        ]);

        // Vérifie si l'utilisateur a déjà signalé ce post
        $alreadyReported = Report::where("post_id", $post->id)
            ->where("user_id", Auth::id())
            ->exists();

        if ($alreadyReported) {
            return response()->json(
                [
                    "message" => __("ui.reports.already_reported"),
                ],
                409,
            );
        }

        $report = new Report();
        $report->post_id = $post->id;
        $report->user_id = Auth::id();
        $report->reason = $validated["reason"] ?? null;
        $report->save();

        return response()->json(
            [
                "message" => __("ui.reports.reported"),
            ],
            201,
        );
    }
}
