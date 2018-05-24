@extends('recruiter_dashboard.layouts.app')
@section('content')

<section class="preview_test_f">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-md-offset-9 col-padding">
        <span id="m_timer">
        </span>
          <a href="{{route('load_section', [ 'sectionid' => $sec_param, 'templateid' => $sec_template_id])}}"><button type="submit" class="btn f_finish" data-url="">Section - {{$sections->order_number}}</button> </a>
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

      

      <div class="row">
       
       

          <div class="col-md-3">

       

              <h3 class="side_caution">Section - {{$sections->order_number}}</h3>
                
      
            
          </div>
   
         
          <div class="col-md-12 border_content">
            <div class="row">
              <div class="col-md-8">
                <h3 class="question_mark">Question No.  of  <span>|4 Marks</span></h3>
                  </div>
                  <div class="col-md-4">
                    <div class="button_mark">
                      <button type="button" class="btn">
                      <i class="glyphicon glyphicon-pushpin"></i><h5 style="margin: 0; margin-left:  19px;"> Flag For Review</h5></button></div>
                  </div>
            </div>
          </div>

        
            @foreach($sections->questions as $question)  
            <div>
              <div class="col-md-5 extended-coding-question">
                <p class="discription_test"><em>{{$question->question_statement}}.</em></p>
                <p class="last_test"><strong></strong></p>
              </div>
              <div class="col-md-7 extended-coding-question border_custom">
                  <!-- <div class="panel panel-default test_panel"> -->
                  <div class="radio s_radio_border">
                      <!-- <div class="panel-body"> -->
                      <label>
                            {{$question->question_statement}}
                          <input type="radio" class="radio_button" name="optradio">
                      </label>
                    
                  </div>
                  <!-- </div> -->
                  <div class="button_question"><button type="button" class="btn">Next Question</button>
                    <button type="button" class="btn">Clear Answer</button>
                  </div>
              </div>
            </div>
            @endforeach
         
         
      </div>
 
   </div>
</section>
@endsection
