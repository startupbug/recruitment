@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form id="save_setting_info" action="{{route('post_setting_info')}}" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label" for="focusedInput">Title</label>
						<input class="form-control" id="focusedInput" type="text" name="title">
					</div>
					<div class="form-group">
						<label class="control-label" for="focusedInput">Info</label>
						<textarea class="form-control counted" name="info_description" rows="5" style="margin-bottom:10px;"></textarea>
					</div>
					<div class="button_info">
						<button type="submit" class="btn">Submit</button>
						<a href="{{route('setting_info')}}">Cancel</a>					
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection