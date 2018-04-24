@extends('admin.masterlayout')
@section('content')
        <div class="row">
            <div class="col-xs-12">
                @include('general_partials.error_section')
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Questions List</h3>
                    </div>
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Question</th>                                    
                                    <th>Support text</th>
                                    <th>Knock out</th>
                                    <th>Format</th>
                                    <th>mandatory</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as  $question)
                                    <tr>
                                        <td>{{$question->question}}</td>                                        
                                        <td>{{$question->support_text}}</td>
                                        <td>{{$question->knock_out}}</td>
                                        <td>{{$question->format_setting_id}}</td>
                                        <td>{{$question->mandatory}}</td>  
                                        <td>  
                                            <a class="btn btn-primary" href="" title="Click To Deactivate">Activated</a>
                                            <a class="btn btn-danger" href="" title="Click To Activate">Deactivate</a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                  <span class="caret"></span></button>
                                                  <ul class="dropdown-menu">
                                                    <li><a href="{{route('admin_edit_question',['id'=>$question->id])}}">Edit</a></li>
                                                    <li><a href="{{route('admin_question_destroy',['id'=>$question->id])}}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    <div class="s_button">
                            <a class="btn btn-primary" href="{{route('create_user')}}">Create</a>
                        </div>  
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
@endsection