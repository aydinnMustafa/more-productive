@extends('layout')
@section('title', "Home Page")
@section('body')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-3">
        <form action="{{ route('add-activity') }}" class="needs-validation" novalidate method="post">
    @csrf
    <div class="form-group">
        <label for="name">What did you do today?</label>
        <input type="text" class="form-control" id="name" name="name" required />
        <div class="invalid-feedback">Must be at least 5 characters long.</div>
    </div>

    <div class="form-group d-flex">
    <div class="me-2 flex-grow-1">
        <label for="hour">Hours</label>
        <input type="number" class="form-control" id="hour" name="hour" min="0" max="24" required />
        <div class="invalid-feedback">Please enter a valid hour value (between 0 and 24).</div>
    </div>

    <div class="flex-grow-1">
        <label for="minute">Minutes</label>
        <input type="number" class="form-control" id="minute" name="minute" min="0" max="59" required />
        <div class="invalid-feedback">Please enter a valid minute value (between 0 and 59).</div>
    </div>
    
</div>

    <div class="d-grid gap-2 col-12 mt-2">
        <button type="submit" class="btn btn-primary btn-block">Add</button>
    </div>
    </div>
        @if(session()->has('error'))
         <div class="alert alert-danger">
        {{ session()->get('error') }}
        </div>
        @endif
</form>
    
        <div class="col-md-7 offset-md-1">
            <div class="card text-white bg-info-subtle" style="max-width: 40rem; height: 9rem;">
                <img src="{{ asset('images/logo.png') }}" class="position-absolute" alt="Logo" style="width: 50px; height: 40px;" />
                <div class="card-header text-center">Welcome, Mustafa</div>
                <div class="card-body">
                    <p class="card-text">
                        “Even if I knew that tomorrow the world would go to pieces, I would still plant my applI would still plant my applI would still plant my apple tree.” <br />
                        - Martin Luther
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3 class="ms-5 mt-4">YOUR DID TODAY</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-3 g-2" style="max-width: 35rem;">

            @foreach($activities as $activity)
                <div class="card text-white bg-success me-2" style="width:12rem; height: 10rem;">
                    <div class="card-header text-center">
                    @if($activity->minute == 0)
                    {{ $activity->hour }} Hours
                    @elseif($activity->hour == 0)
                    {{ $activity->minute }} Minutes
                    @else
                    {{ $activity->hour }} Hours {{ $activity->minute }} Minutes
                    @endif
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $activity->name }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="col-md-4">
            <h3 class="mt-4">YOUR WEEKLY PROGRESS</h3>
            <div class="card w-75">
                <h4 class="text-center">Weekly work for your goal</h4>
                <div class="progress progress-striped active mb-4">
                    <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
                </div>

                <h4 class="text-center">Complete tasks</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="mt-4 text-center">YOUR DAILY PLAN</h3>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row container d-flex justify-content-center">
                        <div class="col-md-12">
                            <div class="card px-3">
                                <div class="card-body">
                                    <div class="list-wrapper">
                                        <ul class="d-flex flex-column-reverse todo-list">
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label"> <input class="checkbox" type="checkbox" /> For what reason would it be advisable. <i class="input-helper"></i></label>
                                                </div>
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check">
                                                    <label class="form-check-label"> <input class="checkbox" type="checkbox" checked="" /> For what reason would it be advisable for me to think. <i class="input-helper"></i></label>
                                                </div>
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label"> <input class="checkbox" type="checkbox" /> it be advisable for me to think about business content? <i class="input-helper"></i></label>
                                                </div>
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label"> <input class="checkbox" type="checkbox" /> Print Statements all <i class="input-helper"></i></label>
                                                </div>
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check">
                                                    <label class="form-check-label"> <input class="checkbox" type="checkbox" checked="" /> Call Rampbo <i class="input-helper"></i></label>
                                                </div>
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label"> <input class="checkbox" type="checkbox" /> Print bills <i class="input-helper"></i></label>
                                                </div>
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    validateINPForPage("addActivity");

    $(document).ready(function () {
        var progress = 0;
        var interval = setInterval(function () {
            progress += 3;
            $(".progress-bar")
                .css("width", progress + "%")
                .attr("aria-valuenow", progress);

            if (progress >= 50) {
                clearInterval(interval);
            }
        }, 150);
    });
</script>

@endsection
