@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="test_question">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
            <p class="caution"><span>Caution!</span> Please do not move away from the window or refresh. You may be marked as suspicious</p>
          </div>
      </div>
    </div>
    <div class="container border_question">

      @foreach($sections as  $section)
    
      <div class="row">
          <div class="col-md-3">
            <h3 class="side_caution">Section - {{$section->order_number}}</h3>
          </div>

          <div class="col-md-9">
            <ul class="pagination question">
            </ul>
          </div>
          @php $questions = $section->questions()->paginate(1) @endphp
          @php $q = count($questions) @endphp
          @php $k = 1 @endphp
          @foreach($questions as $question)
          <div class="col-md-12 border_content">
            <div class="row">
              <div class="col-md-8">
                <h3 class="question_mark">Question No. {{$k}} of {{$q}} <span>|4 Marks</span></h3>
                  </div>
                  <div class="col-md-4">
                    <div class="button_mark">
                      <button type="button" class="btn">
                      <i class="glyphicon glyphicon-pushpin"></i><h5 style="margin: 0; margin-left:  19px;"> Flag For Review</h5></button></div>
                  </div>
            </div>
          </div>

          <div class="col-md-5">
            <p class="discription_test"><em>You are provided with two definitions and options,choose the correct option which fits the discription best.</em></p>
            <p class="last_test"><strong>{{$question->question_statement}}</strong></p>
          </div>
          <div class="col-md-7 ">
              <div class="panel panel-default test_panel">
                @php $choice = $question->multiple_choice()->get()  @endphp
                @foreach($choice as $options)
                  <div class="panel-body">
                    <div class="radio">
                      <label><input type="radio" name="optradio">{{$options->choice}}</label>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="button_question"><button type="button" class="btn">Next Question</button>
                <button type="button" class="btn">Clear Answer</button>
                {{$questions->links()}}
              </div>
         </div>
         @php $k++ @endphp

         @endforeach
      </div>
      @endforeach
   </div>
</section>
@endsection