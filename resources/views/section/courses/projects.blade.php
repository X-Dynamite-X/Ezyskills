@if(isset($course->courseInfo->projects))
    @php
        $projects = \App\Helpers\ArrayHelper::toArray($course->courseInfo->projects);
    @endphp
    
    <div class="mt-12 mb-8">
        <h2 class="text-2xl font-bold mb-6">Course Projects</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $title => $details)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-4">{{ $title }}</h3>
                        <ul class="list-disc pl-5 space-y-2">
                            @foreach($details as $detail)
                                <li>{{ $detail }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif