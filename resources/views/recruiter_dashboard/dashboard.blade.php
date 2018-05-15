@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="content_image">
	<div class="container">
		<div class="row flex">
			<div class="col-md-4">
				<a href="{{route('manage_test_view')}}">
					<div class="border">

						<div class="image_left"><img src="{{ asset('public/assets/img/edit.png') }}" class="img-responsive">
							<p class="content_bottom">Manage Tests, invite candidates and view reports</p>
						</div>
						<h3 class="content_last">Manage Tests</h3>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="{{route('lib_index')}}">
					<div class="border">
						<div class="image_left"><img src="{{ asset('public/assets/img/book.png') }}" class="img-responsive">
							<p class="content_bottom">Create and manage questions for the tests</p>
						</div>
						<h3 class="content_last">Questions Library</h3>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="{{route('general_setting')}}">
					<div class="border">
						<div class="image_left"><img src="{{ asset('public/assets/img/option.png') }}" class="img-responsive">
							<p class="content_bottom">Settings</p>
						</div>
						<h3 class="content_last">Settings</h3>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
@endsection