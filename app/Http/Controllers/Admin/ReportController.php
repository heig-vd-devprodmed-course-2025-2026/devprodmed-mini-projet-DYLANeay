<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ReportController extends Controller
{
    public function index()
    {
        $pending = fn($q) => $q->where("status", "pending");

        $posts = Post::whereHas("reports", $pending) // uniquement les posts avec au moins 1 report pending
            ->withCount(["reports as pending_reports_count" => $pending]) // compte les reports pending par post
            ->with("user")
            ->with([
                //q = param qui représente donc reports
                "reports" => fn($q) => $q
                    ->where("status", "pending")
                    ->with("user")
                    ->latest(),
            ]) // reports pending + leur auteur, du plus récent
            ->latest()
            ->paginate(15);

        return view("admin.reports.index", ["posts" => $posts]);
    }
}
