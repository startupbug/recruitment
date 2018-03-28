@extends('layouts.app')
@section('content')
<section class="info">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
  <label class="control-label" for="focusedInput">Title</label>
  <input class="form-control" id="focusedInput" type="text">
</div>
<div class="form-group">
  <label class="control-label" for="focusedInput">Info</label>
     <textarea class="form-control counted" name="message" rows="5" style="margin-bottom:10px;"></textarea>
</div>
<div class="button_info"><button type="button" class="btn">Submit</button>
	<a href="#">Cancel</a>
</div>
		</div>
	</div>
	</div>
</section>
@endsection