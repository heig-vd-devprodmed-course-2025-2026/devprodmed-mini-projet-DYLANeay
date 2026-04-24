<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            "reason" => ["nullable", "string", "max:255"],
        ]);

        //Un utilisateur ne peut pas signaler un meme post plus d'une fois
        $alreadyReported = $post
            ->reports()
            ->where("user_id", $request->user()->id)
            ->exists();
        //Donc si il n'a pas été déjà signalé, on le signale
        if (!$alreadyReported) {
            $post->reports()->create([
                "user_id" => $request->user()->id,
                "reason" => $request->reason,
            ]);
        }
        //Dans tous les cas on redirige vers la dernière page visitée
        return back()->with("success", __("ui.reports.reported"));
    }
}
