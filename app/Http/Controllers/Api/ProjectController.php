<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('type')) {
            $projects = Project::with('type', 'technologies')->where('type_id', $request->query('type'))->paginate(4);
        } else {
            $projects = Project::with('type', 'technologies')->paginate(4);
        }
        return response()->json(
            [
                'status' => 'success',
                'message' => 'ok',
                'results' => $projects
            ]
        );
    }
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        if ($project) {
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'ok',
                    'results' => $project
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Project not found'
                ]
            );
        }
    }
}
//vueflux