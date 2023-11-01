@if (session('create_success'))
    <div class="alert alert-success">
        {{ session('create_success') }}
    </div>
@endif

@if (session('create_fail'))
    <div class="alert alert-danger">
        {{ session('create_fail') }}
    </div>
@endif

@if (session('update_success'))
    <div class="alert alert-success mx-3">
        {{ session('update_success') }}
    </div>
@endif

@if (session('update_fail'))
    <div class="alert alert-danger">
        {{ session('update_fail') }}
    </div>
@endif

@if (session('delete_success'))
    <div class="alert alert-success">
        {{ session('delete_success') }}
    </div>
@endif

@if (session('delete_fail'))
    <div class="alert alert-danger mx-3">
        {{ session('delete_fail') }}
    </div>
@endif
