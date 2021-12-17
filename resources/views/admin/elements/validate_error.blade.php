@if ($errors->any())
    <div class="alert alert-danger">
        <h4><i class="fa fa-warning"></i> Warning!</h4>
        @foreach ($errors->all() as $error)
            <p style="margin-left: 15px">- {{ $error }}</p>
        @endforeach
    </div>
@endif
