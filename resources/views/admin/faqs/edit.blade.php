@extends('admin.masterlayout')
@section('content')
@include('general_partials.error_section')
	<h1>This is create question page</h1>

	<form class="form-horizontal" action="{{route('edit_faq_question',$edit_que->id)}}" method="post" >
        {{csrf_field()}}
      <input type="hidden" name="id" value="{{$edit_que->id}}">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="question" value="{{($edit_que->question)}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Answer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="answer" value="{{($edit_que->answer)}}" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Save Question</button>
            </div>
        </div>
    </form>

@endsection