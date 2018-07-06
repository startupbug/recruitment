@extends('admin.masterlayout')
@section('content')
@include('general_partials.error_section')
	<h1>This is create question page</h1>

	<form class="form-horizontal" action="{{route('create_faq_questions')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="question" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Answer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="answer" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Save Question</button>
            </div>
        </div>
    </form>

@endsection