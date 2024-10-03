<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {
    $jobs = Job::all();

//    $jobId = 1;
//    $job = Job::find($jobId);
//
//    if ($job) {
//        echo $job->employer->name; // Make sure Employer has a 'name' field
//    } else {
//        echo 'Job not found';
//    }

    $secondJob = $jobs->get(0);
    dd($secondJob->id);
});

Route::get('/jobs', function () {

//    $jobs = Job::with('employer')->paginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

//demo part
Route::post('/jobs', function () {
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
