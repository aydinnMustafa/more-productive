@extends('layout')
@section('title', "Home Page")
@section('body')

<div class="container-fluid">
    <div class="card ms-auto me-auto text-center text-white bg-info-subtle mt-3" style="max-width: 32rem; height: 9rem;">
        <img src="{{ asset('images/logo.png') }}" class="position-absolute" alt="Logo" style="width: 50px; height: 40px;" />
        <div class="card-header text-center">Welcome, Mustafa</div>
        <div class="card-body">
            <p class="card-text">
                “Even if I knew that tomorrow the world would go to pieces, I would still plant my apple tree.” <br />
                - Martin Luther
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3 class="ms-5 mt-4">YOUR DID TODAY</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2" style="max-width: 40rem;">
                <div class="card text-white bg-success me-2" style="max-width: 18rem; height: 8rem;">
                    <div class="card-header text-center">Instagram</div>
                    <div class="card-body">
                        <p class="card-text">I used 4 hours in today.</p>
                    </div>
                </div>
                <div class="card text-white bg-success me-2" style="max-width: 18rem; height: 8rem;">
                    <div class="card-header text-center">Instagram</div>
                    <div class="card-body">
                        <p class="card-text">I used 4 hours in today.</p>
                    </div>
                </div>
                <div class="card text-white bg-success me-2" style="max-width: 18rem; height: 8rem;">
                    <div class="card-header text-center">Instagram</div>
                    <div class="card-body">
                        <p class="card-text">I used 4 hours in today.</p>
                    </div>
                </div>

                <div class="card text-white bg-success me-2" style="max-width: 18rem; height: 8rem;">
                    <div class="card-header text-center">Header</div>
                    <div class="card-body">
                        <p class="card-text">Some q.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="mt-4">YOUR WEEKLY PROGRESS</h3>
            <div class="card w-75">
                <div class="card-body d-flex justify-content-center">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2" style="max-width: 45rem;">
                        <div class="card text-white bg-success me-2" style="width: 10rem; height: 10rem;">
                            <div class="card-header text-center">Instagram</div>
                            <div class="card-body">
                                <p class="card-text">I used 4 hours in today.</p>
                            </div>
                        </div>

                        <div class="card text-white bg-success me-2" style="width: 10rem; height: 10rem;">
                            <div class="card-header text-center">Instagram</div>
                            <div class="card-body">
                                <p class="card-text">I used 4 hours in today.</p>
                            </div>
                        </div>

                        <div class="card text-white bg-success me-2" style="width: 10rem; height: 10rem;">
                            <div class="card-header text-center">Instagram</div>
                            <div class="card-body">
                                <p class="card-text">I used 4 hours in today.</p>
                            </div>
                        </div>

                        <div class="card text-white bg-success me-2" style="width: 10rem; height: 10rem;">
                            <div class="card-header text-center">Header</div>
                            <div class="card-body">
                                <p class="card-text">Some q.</p>
                            </div>
                        </div>
                    </div>
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
@endsection