@include('candidate.partials.header')
<section class="info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form id="can_save_setting_info" action="{{route('post_can_info')}}" method="POST">
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
						<a href="{{route('can_info')}}">Cancel</a>					
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<div class="loader hidden"></div>
@include('candidate.partials.footer')