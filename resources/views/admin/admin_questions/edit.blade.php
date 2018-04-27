@extends('admin.masterlayout')
@section('content')
	<h1>This is create question page</h1>

	<form class="form-horizontal" action="{{route('update_question_for_admin',$edit_task->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="question" value="{{($edit_task->question)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Support text</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Supporttext" value="{{($edit_task->support_text)}}">
            </div>
        </div>
            <label class="col-sm-2 control-label">Knock out</label>
          
                 <input type="checkbox" name="Knockout" value="{{($edit_task->knock_out)}}"> Don't allow the candidate to take the test if the criteria does not meet<br>
           
        
        
        <div class="form-group">
            <label for="inputCountry" class="col-sm-2 control-label">Format</label>
            <div class="col-sm-6">
                <select name="format" class="form-control">
                    <option selected disabled>Select a Type</option>
                   @foreach($items as $item)
                        <option value="{{($item->id)}}">{{($item->name)}}</option>
                    @endforeach
                </select>
            </div>
            <input type="checkbox" name="mandatory" value="1">mandatory
        </div>

        <div class="form-group">
            <label for="inputCountry" class="col-sm-2 control-label">Question Type</label>
            <div class="col-sm-6">
                <select name="question_type" class="form-control" required>
                    <option selected disabled>Select a Type</option>
                    @foreach($question_type as $value)
                    <option value="{{$value->id}}">{{$value->question_type}}</option>
                    @endforeach()
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Save Question</button>
            </div>
        </div>
    </form>

@endsection