@if (session('success'))
	<div class="alert-success">
		{{ session('success') }}
	</div>
@endif

@if (session('info'))
	<div class="alert-info">
		{{ session('info') }}
	</div>
@endif

@if (session('danger'))
	<div class="alert-danger">
		{{ session('danger') }}
	</div>
@endif