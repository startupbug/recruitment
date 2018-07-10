@extends('recruiter_dashboard.layouts.app')
@section('content')

<section class="preview_test_f">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-md-offset-9 col-padding">
        <span id="m_timer">
        </span>
        @if(Auth::check())
          @if(Auth::user()->role_id == 2)
          <a class="finish_url" href="{{route('load_section1', [ 'sectionid' => $sec_param, 'templateid' => $sec_template_id])}}">
            <button type="submit" class="btn f_finish" data-url="">Finish test</button> 
          </a>
          @endif
          @if(Auth::user()->role_id == 3)
          <a class="finish_url" href="{{route('load_section', [ 'sectionid' => $sec_param, 'templateid' => $sec_template_id])}}">
            <button type="submit" class="btn f_finish" data-url="">Finish test</button> 
          </a>
          @endif
        @endif
          
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
        <div class="col-md-7">
          <div class="pagination-container" style="position: relative;">
            <nav>
              <ul id="mcqs_pagination_number" class="pagination pagination_custom" data-message="{{count($sections->questions)}}">
              </ul>
            </nav>
          </div>
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

        
        @foreach($sections->questions as $key => $question)      
          <div id="question_pre_text_{{ $key+1 }}" class="question_pre @if($key == 0) active @endif ">
            <div class="col-md-5 extended-coding-question">
              <p class="discription_test"><em>{!!$question->question_statement!!}.</em></p>
              <p class="last_test"><strong></strong></p>
            </div>
            <div class="col-md-7 extended-coding-question border_custom">
              
                <div id="mcqs_radio_border_{{ $key+1 }}" class="radio s_radio_border">
                @if($question->question_type_id == 1)
                  @if(isset($options))
                    @foreach($options as $option)
                        @foreach($option as $opt)
                          <label> 
                            {{$opt->choice}}
                          </label>
                        @endforeach 
                    @endforeach
                  @endif
                @endif
                </div>
              
              @if($question->question_type_id == 2 )
                @if(isset($coding_entries))
                  @foreach($coding_entries as $coding_entry)
                  
                    @foreach($coding_entry as $key => $coding)
                    {{$key +1}}
                      <label> 
                      input  {{($coding->input)}}
                      output  {{($coding->output)}}
                      </label>
                    @endforeach
                  @endforeach
                @endif
              @endif



              @if($question->question_type_id == 3 )
                @if(isset($submissions))
                  @foreach($submissions as $submission)
                    @foreach($submission as $key => $sub)
                      <label> 
                       {{$key + 1}} {{($sub->submission_evaluation_title)}}
                      </label>
                    @endforeach
                  @endforeach
                @endif
              @endif

                <div class="button_question">
                  @if(count($sections->questions) > $key+1)
                  <button type="button" class="btn next_question"  data-page="{{ $key+2 }}">Next Question</button>
                  @endif
                  <button type="button" class="btn clear_question">Clear Answer</button>
                </div>
                @if(count($sections->questions) <= $key+1)
                <p class="text-info">Click the "Finish" on the top right corner to finish the section. </p>
                @endif
            </div>
          </div>
        @endforeach
         
         
      </div>
 
   </div>
</section>

@endsection


@section('script')
  jQuery(window).blur(function() {
    alertify.error("Do not change window or you will be marked suspecious")
  });
@endsection