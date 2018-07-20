


                       <div class="resultClose pull-right"></div>
                       <div>
                         <ul id="hkb" class="hkb-searchresults">
                        @if(count($results) > 0)  
                        @foreach($results as $result)
                        
                           <li class="hkb-searchresults__article hkb-post-type-ht_kb format-standard">
                             <a href="#" onclick="window.open(this.href, &quot;windowName&quot;, &quot;width=500, height=500, right=20, top=20, scrollbars, resizable&quot;);return false;">
                              <a href="">
                               <span class="hkb-searchresults__title">{{$result->question}}</span>
                               <span class="hkb-searchresults__excerpt">&nbsp; {{$result->answer}}
                               </span>
                               </a>
                             </a>
                           </li>
                        @endforeach   
                        <!--    <li class="hkb-searchresults__article hkb-post-type-ht_kb format-standard">
                             <a href="#" onclick="window.open(this.href, &quot;windowName&quot;, &quot;width=500, height=500, right=20, top=20, scrollbars, resizable&quot;);return false;">
                               <span class="hkb-searchresults__title">Guide On How To Manage Reports</span>
                               <span class="hkb-searchresults__excerpt">&nbsp; Codeground provides easy to interpret reports that aid recruiters in viewing, managing and maintaining crucial candidate test results. This...</span>
                             </a>
                           </li>
                           <li class="hkb-searchresults__article hkb-post-type-ht_kb format-standard">
                             <a href="#" onclick="window.open(this.href, &quot;windowName&quot;, &quot;width=500, height=500, right=20, top=20, scrollbars, resizable&quot;);return false;">
                               <span class="hkb-searchresults__title">Guide On How To Manage Reports</span>
                               <span class="hkb-searchresults__excerpt">&nbsp; Codeground provides easy to interpret reports that aid recruiters in viewing, managing and maintaining crucial candidate test results. This...</span>
                             </a>
                           </li>
                           <li class="hkb-searchresults__article hkb-post-type-ht_kb format-standard">
                             <a href="#" onclick="window.open(this.href, &quot;windowName&quot;, &quot;width=500, height=500, right=20, top=20, scrollbars, resizable&quot;);return false;">
                               <span class="hkb-searchresults__title">Guide On How To Manage Reports</span>
                               <span class="hkb-searchresults__excerpt">&nbsp; Codeground provides easy to interpret reports that aid recruiters in viewing, managing and maintaining crucial candidate test results. This...</span>
                             </a>
                           </li>
                           <li class="hkb-searchresults__article hkb-post-type-ht_kb format-standard">
                             <a href="#" onclick="window.open(this.href, &quot;windowName&quot;, &quot;width=500, height=500, right=20, top=20, scrollbars, resizable&quot;);return false;">
                               <span class="hkb-searchresults__title">Guide On How To Manage Reports</span>
                               <span class="hkb-searchresults__excerpt">&nbsp; Codeground provides easy to interpret reports that aid recruiters in viewing, managing and maintaining crucial candidate test results. This...</span>
                             </a>
                           </li>
                           <li class="hkb-searchresults__article hkb-post-type-ht_kb format-standard">
                             <a href="#" onclick="window.open(this.href, &quot;windowName&quot;, &quot;width=500, height=500, right=20, top=20, scrollbars, resizable&quot;);return false;">
                               <span class="hkb-searchresults__title">Guide On How To Manage Reports</span>
                               <span class="hkb-searchresults__excerpt">&nbsp; Codeground provides easy to interpret reports that aid recruiters in viewing, managing and maintaining crucial candidate test results. This...</span>
                             </a>
                           </li> -->
                           <li class="hkb-searchresults__showall">
                             <a href="#" onclick="window.open(this.href, &quot;windowName&quot;, &quot;width=500, height=500, right=20, top=20, scrollbars, resizable&quot;);return false;">
                               Show all results
                             </a>
                           </li>
                          @else
                           <li class="hkb-searchresults__noresults">
                             <span>No Results</span>
                           </li>
                          @endif
                         </ul>
                       </div>