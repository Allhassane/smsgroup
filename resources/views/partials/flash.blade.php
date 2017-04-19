@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@elseif(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@elseif(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif