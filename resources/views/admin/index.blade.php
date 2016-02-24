@extends('app')

@section('meta')

@endsection

@section('content')

@include('includes.admin_nav')

<div class="container-fluid" style="min-height:600px;padding-top:150px;">
  <div class="row">
    <div class="col-md-6 col-md-offset-2">
      <h1>Welcome</h1>
      <h2>Fests</h2>
      <table class="table table-hover">
        <tr>
          <th>Name</th>
          <th>Department</th>
          <th>Link</th>
        </tr>
        @foreach($fests as $fest)
         <tr>
           <td>{{$fest->name}}</td>
           <td>{{$fest->department}}</td>
           <td><a href="{{url('/admin/showfest/'.$fest->id)}}" class="btn">View Details</a></td>
         </tr>
        @endforeach
      </table>
      <a href="{{url('/admin/newfest')}}" class="btn">Add Fest</a>
    </div>
  </div>
</div>

<div class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-md-offset-2">
        <h3>FestManager</h3>
        <p>© 2015 FestManager.</p>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
{!! Html::script('js/owl.carousel.js') !!}
<script>

$(document).ready(function() {

      $("#owl-demo").owlCarousel({

          autoPlay: 3000, //Set AutoPlay to 3 seconds

          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]

      });

      $(".hash").click(function(event){
         // alert("hey");
         event.preventDefault();
         $('html,body').stop().animate({scrollTop:$(this.hash).offset().top},1000);
      });


    });

</script>
@endsection
