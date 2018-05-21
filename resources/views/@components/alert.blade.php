@if(session()->get('error'))
<div class="alert alert-danger">
    <p>{{session()->get('error')}}</p>
</div>
@endif

@if(session()->get('success'))
<div class="alert alert-success">
    <p>{{session()->get('success')}}</p>
</div>
@endif