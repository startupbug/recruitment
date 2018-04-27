@extends('admin.masterlayout')
@section('content')
	<h1>This is create question page</h1>

	<form class="form-horizontal" action="{{route('create_question_for_admin')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="question" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Support text</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Supporttext" required>
            </div>
        </div>
            <label class="col-sm-2 control-label">Knock out</label>
          
                 <input type="checkbox" name="Knockout" value="1" required> Don't allow the candidate to take the test if the criteria does not meet<br>
           
        
        
        <div class="form-group">
            <label for="inputCountry" class="col-sm-2 control-label">Format</label>
            <div class="col-sm-6">
                <select name="format" class="form-control" required>
                    <option  disabled>Select a Type</option>
                    @foreach($items as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach()
                </select>
            </div>
            <input type="checkbox" name="mandatory" value="1" required>mandatory
        </div>
<br>
        <div class="form-group">
            <label for="inputCountry" class="col-sm-2 control-label">Question Type</label>
            <div class="col-sm-6">
                <select name="question_type" class="form-control" required>
                    <option  disabled>Select a Type</option>
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