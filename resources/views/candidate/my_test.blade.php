@include('candidate.partials.header')
<div class="container">
   <div class="my-test-doc">
      <div class="text-center">Must read before starting test <i class="fa fa-long-arrow-right"></i>
         <a href="#">Learn
         how your code will be evaluated</a> and
         <a href="#">
         Utility codes for quick start during test</a>
      </div>
   </div>
   <div class="text-info">You are not assigned to any test.</div>
   <div class="row">
      <div class="pageTitle">My Tests
         <a href="" style="float:right;" data-toggle="modal" data-target="#create-test-template-Modal">
         <span uib-tooltip="Click to check your system health" class="img-icon img-icon-sysHealth" ></span>
         </a>
      </div>
   </div>
</div>
@include('candidate.partials.footer')