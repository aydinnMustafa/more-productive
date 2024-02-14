@extends('layout')
@section('title', "My Goal and Plans")
@section('body')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body text-center">
                    @if(Auth::user()->goal)
                        <h4 class="card-title">Your Goal</h4>
                        <div class="row">

                            <p id="goal" class="card-text">{{ Auth::user()->goal }}</p>
                        </div>
                        <button class="btn btn-sm btn-primary mb-3" onclick="goalPlanHandler('goal')">Edit</button>

                    @else
                        <h4 class="card-title">Set Your Goal</h4>
                        <form action="set-goal" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="goal" placeholder="Enter your goal">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Set Goal</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h3 class="ms-5 mt-4">Your Weekly Plan</h3>
            <div class="row">
                
            <div class="col-md-4">
                    <h5 class="mb-2">Monday</h5>
                    <ul class="list-group mb-2">
                        <li class="list-group-item">Plan 1</li>
                        <li class="list-group-item">Plan 2</li>
                        <li class="list-group-item">Plan 3</li>
                    </ul>
                </div>
                
                <div class="col-md-4">
    <h5 class="mb-2">Monday</h5>
    <ul class="list-group mb-2">
        <li id="1" class="list-group-item d-flex justify-content-between align-items-center">Plan 1<span><i class="fas fa-edit" onclick="goalPlanHandler(1)"></i></span></li>
        <li id="2" class="list-group-item d-flex justify-content-between align-items-center">Plan 2<span><i class="fas fa-edit" onclick="goalPlanHandler(2)"></i></span></li>
        <li id="3" class="list-group-item d-flex justify-content-between align-items-center">Plan 3<span><i class="fas fa-edit" onclick="goalPlanHandler(3)"></i></span></li>
    </ul>
</div>

                </div>
        </div>
        
        <div class="col-md-4">
    <h3 class="mt-4 text-center mb-5">Create New Plan</h3>
    <div class="d-flex justify-content-center flex-column align-items-center">
        <input type="text" class="form-control mb-3" id="name" name="name" required />
        <button class="btn btn-primary">Button</button>
        <p class="mt-2">HERE WILL BE EXPLANATION TEXT, CREATING A NEW PLAN, HOW IT WORKS, ETC.</p>

        <button class="btn btn-primary">Save New Plan</button>
    </div>
</div>



    </div>
</div>
</div>



<script>
function goalPlanHandler(id) {
    var planText = document.getElementById(id).innerText;
    var editInput = document.createElement('input');
    editInput.setAttribute('type', 'text');
    editInput.setAttribute('value', planText);
    editInput.setAttribute('id', 'editInput');

    if(id == "goal"){
        var saveButton = document.createElement('button');
        saveButton.innerText = 'Save';
        saveButton.classList.add('btn', 'btn-sm', 'btn-primary');
    
        saveButton.onclick = function() { // When the save button is clicked
            var newPlanText = editInput.value;
    
            // Create a form and submit by adding target text
            var form = document.createElement('form');
            form.setAttribute('method', 'POST');
            form.setAttribute('action', '/set-goal');
                
            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.setAttribute('type', 'hidden');
            csrfTokenInput.setAttribute('name', '_token');
            csrfTokenInput.setAttribute('value', '{{ csrf_token() }}');
                
            var goalInput = document.createElement('input');
            goalInput.setAttribute('type', 'hidden');
            goalInput.setAttribute('name', 'goal');
            goalInput.setAttribute('value', newPlanText);
                
            form.appendChild(csrfTokenInput);
            form.appendChild(goalInput);
                
            document.body.appendChild(form);
            form.submit();
        }
    
    var planDiv = document.getElementById(id);
    planDiv.innerHTML = '';
    planDiv.appendChild(editInput);
    planDiv.appendChild(saveButton);
    }else{ // If the goal is being edited, we also add the save button, otherwise we just add the input.
    var planDiv = document.getElementById(id);
    planDiv.innerHTML = '';
    planDiv.appendChild(editInput);
    }
}
</script>

@endsection