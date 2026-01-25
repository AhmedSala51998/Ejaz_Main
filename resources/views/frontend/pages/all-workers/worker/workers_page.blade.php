@if (count($cvs) > 0)

    @foreach($cvs as $cv)
        <div class="col-md-6 col-lg-4 p-2" data-aos="fade-down">
            <!-- cv -->
            @include('frontend.pages.all-workers.worker.worker_component')
            <!-- end cv -->
        </div>
    @endforeach

    @if ($cvs instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="col-12 mt-4">
            <div class="d-flex justify-content-center">
                {{ $cvs->appends(request()->except('page'))->links('vendor.pagination.custom') }}
            </div>
        </div>
    @endif

@else
    <div class="d-flex align-items-center justify-content-center py-5 row">
        <img style="width: 100%; padding: 20px; height: 300px; object-fit: contain;" src="{{ asset('frontend/img/no_data.png') }}" alt="no data for current orders">
    </div>

    <div class="text-center mt-2 mb-4">
        <h2>{{ __('frontend.no result for search') }}</h2>
    </div>
@endif
