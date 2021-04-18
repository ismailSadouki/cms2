
@if (session('success'))
<div class="alert alert-success text-right">
    {{ session('success') }}
</div>
@endif  