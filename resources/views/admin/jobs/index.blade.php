@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


        <select class="form-select form-select-sm col px-2 mr-1" aria-label="Default select example" name="jobCategories">
            <option selected>Job Category</option>
            @foreach ($jobCategories as $jobCategory)
            <option value="{{$jobCategory->id}}">{{$jobCategory->title}}</option>
            @endforeach
        </select>
        <select class="form-select form-select-sm col px-2 mr-1" aria-label="Default select example" name="jobCategories">
            <option selected>Companies</option>
            @foreach ($jobs as $job)
            <option value="{{$job->id}}">{{$job->employer->user->name}}</option>
            @endforeach
        </select>
        <select class="form-select form-select-sm col px-2 mr-3 " aria-label="Default select example" name="jobCategories">
            <option selected>Location</option>
            @foreach ($jobs as $job)
            <option value="{{$job->id}}">{{$job->employer->company_postal_address}}</option>
            @endforeach
        </select>
        <form class="form-inline my-2 my-md-0 col">
            <input class="form-control" placeholder="Search"></input>
        </form>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <h6 class="border-bottom border-gray pb-2 mb-0"> Jobs </h6>


                @if (count($jobs) === 0)
                <p> There are no jobs.</p>
                @else

                @foreach ($jobs as $job)
                <div class="media text-muted pt-3">
                    <img
                      src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_177d4556b39%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_177d4556b39%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                      class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                    <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
                        <a href="{{ route('admin.jobs.show', $job->id) }}"><strong class="d-block text-dark">{{$job->title}}</strong></a>
                        {{$job->description}}


                    </p>
                      {{-- <small class="date-only">{{$job->updated_at}}</small> --}}
                </div>
                @endforeach
                <div class="col mt-5">
                    {{ $jobs->links() }}
                </div>
            </div>
            @endif
        </div>
        <div class="col-4">
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <div class="card-body">
                    <h5 class="card-title">Create a Listing</h5>
                    <p class="card-text">If you would like to create your own job listing follow the link below.</p>
                    <a href="{{route('admin.jobs.create')}}" class="btn btn-primary">Create</a>
                </div>
            </div>
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <div class="card-body">
                    <h5 class="card-title">Promotional Listing</h5>
                    <p class="card-text">Employers! This could be your listing. Click see more to find out more.</p>
                    <a href="#" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
{{-- </div> --}}
@include('layouts.footer')
@endsection