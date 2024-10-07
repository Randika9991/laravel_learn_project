<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>

    <p>
        This job pays {{ $job->salary }} per year.
    </p>

    @if(Auth::check())
    <p>Logged in as: {{ Auth::user()->name }} (ID: {{ Auth::user()->id }})</p>
    @endif

    @can('edit', $job)
    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    @else
    <p>You are not authorized to edit this job.</p>
    <p>Job ID: {{ $job->id }}</p>
    <p>Employer ID: {{ $job->employer->id }}</p>
    <p>Employer User ID: {{ $job->employer->user->id }}</p>
    <p>Current User ID: {{ Auth::user()->id }}</p>
    @if(Auth::user()->isAdmin())
    <p>You are an admin, but there's an issue with permissions.</p>
    @endif
    @endcan




    <x-slot:background>
        <h1>background</h1>
    </x-slot:background>
</x-layout>


<!--{{ $job->salary }} = {{$job['salary']}}-->
