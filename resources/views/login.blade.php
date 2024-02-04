@extends('layout')
@section('title', "Login")
@section('body')
<div class="container">
    <form class="ms-auto me-auto mt-3 needs-validation" style="width: 500px" novalidate>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
            <div class="invalid-feedback">Username must be at least 3 characters long.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
            <div class="invalid-feedback">Password must be at least 6 characters long.</div>
        </div>
        <button type="submit" class="btn btn-primary text-uppercase">Login</button>
    </form>
</div>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        forms.forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

        // Define validation conditions
        const validationConditions = {
            username: {
                condition: (value) => value.length >= 3,
            },
            password: {
                condition: (value) => value.length >= 6,
            }
        }

        // Listen for input events to validate fields dynamically
        forms.forEach(form => {
            form.addEventListener('input', event => {
                if (event.target.tagName === 'INPUT') {
                    const fieldName = event.target.name
                    const fieldValue = event.target.value.trim()
                    const condition = validationConditions[fieldName]

                    if (condition && !condition.condition(fieldValue)) {
                        event.target.setCustomValidity(condition)
                    } else {
                        event.target.setCustomValidity('')
                    }
                }
            })
        })
    })()
</script>

@endsection
