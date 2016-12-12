@if(session('error'))
<div class="row">
	<div class="">
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('error') }}
		</div>
	</div>
</div>
@endif