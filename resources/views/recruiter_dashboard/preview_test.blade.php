@extends('recruiter_dashboard.layouts.app')
@section('content')

<section class="preview_test_f">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-md-offset-9 col-padding">
        <span id="m_timer">

        </span>
        <button type="button" class="btn f_finish">Finish Test</button>
      </div>
    </div>
  </div>
</section>
<div class="container-fuild">

</div>
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

          <!-- <div class="col-md-9"> -->
            <!-- <ul class="pagination question"> -->
              <!-- <li><a href="#">«</a></li>
    					<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
    					<li><a href="#">2</a></li>
    					<li><a href="#">3</a></li>
    					<li><a href="#">4</a></li>
    					<li><a href="#">5</a></li>
    					<li><a href="#">»</a></li> -->
            <!-- </ul> -->
          <!-- </div> -->
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
          <div class="col-md-5 extended-coding-question">
            <p class="discription_test"><em>You are provided with two definitions and options,choose the correct option which fits the discription best.</em></p>
            <p class="last_test"><strong>{{$question->question_statement}}</strong></p>
          </div>
          <div class="col-md-7 extended-coding-question border_custom">
              <!-- <div class="panel panel-default test_panel"> -->
              <div class="radio s_radio_border">
                @php $choice = $question->multiple_choice()->get()  @endphp
                @foreach($choice as $options)
                  <!-- <div class="panel-body"> -->
                  <label>
                    <input type="radio" class="radio_button" name="optradio">{{$options->choice}}
                  </label>
                  <!-- </div> -->
                @endforeach
              </div>
              <!-- </div> -->
              <div class="button_question"><button type="button" class="btn">Next Question</button>
                <button type="button" class="btn">Clear Answer</button>
              </div>
          </div>

          <div class="pagination_number_top">
            {{$questions->links()}}
          </div>

         @php $k++ @endphp
         @endforeach
      </div>
      @endforeach
   </div>
</section>
@endsection
