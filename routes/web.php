<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {
//    $jobs = Job::all();

//    $jobId = 1;
//    $job = Job::find($jobId);
//
//    if ($job) {
//        echo $job->employer->name; // Make sure Employer has a 'name' field
//    } else {
//        echo 'Job not found';
//    }
    return view('welcome');
//    $secondJob = $jobs->get(0);
//    dd($secondJob->id);
});

//index
Route::get('/jobs', function () {

//    $jobs = Job::with('employer')->paginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

//store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

//edit job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

//update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job = Job::findOrFail($id); // Find the job by ID or throw a 404 error

    $updated = $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
//        'employer_id' => request('employer_id') ?? $job->employer_id, // Fallback to current employer if not provided
    ]);

    if ($updated) {
            return redirect('/jobs/' . $job->id);
    }
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize (On hold...)

    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
