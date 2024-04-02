<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobApplicationController extends Controller
{

    public function create(Job $job)
    {
        return view('job_application.create', ['job' => $job]);
    }


    public function store(Job $job, Request $request)
    {
        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate(['expected_salay' => 'required|min:1|max:1000000'])
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted. ');
    }


    public function destroy(string $id)
    {
        //
    }
}
