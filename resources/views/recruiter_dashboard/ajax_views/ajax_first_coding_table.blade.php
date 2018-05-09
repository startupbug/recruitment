    @foreach($ques2 as $serial_number => $q)
                                    <!-- question type id = 2 -->
                                       <tr>
                                             <td><input type="checkbox"  class="prog_c" value="{{$q->question_id}}"></td>
                                             <td>{{++$serial_number}}</td>
                                             <td class="col-md-10 col-sm-12 col-xs-12">
                                                <div class="statement">
                                                   <div class="row">
                                                      <div class="single-line-ellipsis">
                                                          <a href="#" onclick="modal_data({{$q->question_id}}, 'modal_coding')" data-id="{{$q->question_id}}" data-url="{{route('coding_question_modal_partial_data')}}" data-toggle="modal" data-target="#coding_modal" class="no-underline coding_question_id" > {!!$q['question_statement']!!}</a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="description text-muted">
                                                   <div class="row">
                                                      <div class="col-md-4 col-sm-12 col-xs-12">
                                                         <div class="row">
                                                            <div class="col-xs-6">
                                                               <span style="text-transform:capitalize;">
                                                               <i>{{$q['level_name']}}</i>
                                                               </span>
                                                            </div>
                                                            <div class="col-xs-6 no-padding-left">
                                                               <span class="text-muted">Marks</span>
                                                               <span class="conjunction">:</span>{{$q['marks']}}
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
                                                         <span class="text-muted">Tags : </span>
                                                         <span class="question-tags">
                                                            @if(isset($q['tag_name']))
                                                               {{$q['tag_name']}}
                                                            @endif
                                                         </span>
                                                      </div>
                                                      </div>
                                                </div>
                                             </td>
                                             <td>
                                                <a id="delete_question" href="{{route('delete_question',['id'=>$q['question_id']])}}" id="delete_question" >
                                                <i class="fa fa-times-circle text-danger"></i>
                                                </a>
                                             </td>
                                       </tr>
                                    @endforeach