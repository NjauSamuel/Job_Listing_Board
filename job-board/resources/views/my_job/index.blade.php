<x-layout>

    <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4"></x-breadcrumbs>

    <div class="mb-8 text-right">

        <x-link-button href="{{ route('my-jobs.create') }}" >Add New</x-link-button>

    </div>

    @forelse($jobs as $job)

        <x-job-card :job="$job"> 
        
            <div class="text-xs text-slate-500">
                @forelse($job->jobApplications as $application)

                    <div class="mb-4 flex items-center justify-between">

                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div> Applied {{ $application->created_at->diffForHumans() }} </div>
                            <div>Download CV</div>
                        </div>

                        <div>
                            Ksh: {{ number_format($application->expected_salary)}}
                        </div>
                    </div>

                @empty

                    <div >No applications yet</div>

                @endforelse

                <div class="flex space-x-2">
                    <x-link-button href="{{route('my-jobs.edit', $job)}}" >Edit</x-link-button>
                </div>

            </div>
        
        </x-job-card>

    @empty

        <div class="rounded-md border border-dashed border-slate-700 border-3 p-8">

            <div class="text-center font-medium">
                No Jobs Yet
            </div>

            <div class="text-center">
                Post your first job <a class="text-indigo-500 hover:underline" href="{{route('my-jobs.create')}}">here!</a>
            </div>
            
        </div>


    @endforelse

</x-layout>