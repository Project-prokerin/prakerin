<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar" >
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
       @if (Auth::user()->role == 'tu'  )

       <li class="dropdown dropdown-list-toggle " >
         {{-- <span href="#" data-toggle="dropdown" class=" message-toggle" id="tempatNotif1"> --}}
           <a href="#" data-toggle="dropdown" id="tempatNotif2"  class="nav-link nav-link-lg message-toggle {{$notifUnread->isEmpty() ? '' : 'beep'}} "><i class="far fa-bell"></i></a>
         {{-- </span> --}}

        <div class="dropdown-menu dropdown-list dropdown-menu-right">
          <div class="dropdown-header">Feedback
            <div class="float-right">
              <a href="#" id="mark-all">Mark All As Read</a>
            </div>
          </div>
          <div class=" dropdown-list-content dropdown-list-message" id="contentNotif">
          @forelse ($notifications as $notification)
          {{-- {{url('/admin/surat_masuk/' . $notification->data['id_detail_surat'] . '/disposisi/view')}} --}}
          <a href="{{url('/admin/surat_masuk/' . $notification->data['id_detail_surat'] . '/disposisi/view')}}" id="FeedbackContent" style="margin-left: -40px;" data-id="{{ $notification->id }}" class="text-left dropdown-item dropdown-item-unread mark-as-read">
            <div class="dropdown-item-desc">
              <b style="color: black;">{{$notification->data['dari']}}</b>
              <p>{{$notification->feedback_description}}</p>
             <div class="row">
                  <div class="col-md-7">
                      <div class="time">{{$notification->created_at->diffForHumans()}}</div>
                  </div>
                  <div class="col-md-5" >
                      <div class="time"><b style="color: rgb(129, 66, 181); margin-right: -30px;" >{{$notification->data['dari_jabatan']}}</b></div>
                  </div>
             </div>
            </div>
          </a>
          @empty
            <div id="FeedbackContent" style="margin-top: 40px;" class=" text-center">
              <h3>Tidak ada Feedback</h3>
            </div>
          @endforelse


          </div>
          <div class="dropdown-footer text-center">
            <a href="{{route('admin.surat_masuk.index')}}">View All <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </li>
       @else

       @endif
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{-- <img alt="image" src="{{ asset('images/tb.png') }}" class="rounded-circle mr-1"> --}}
                <div class="d-sm-none d-lg-inline-block">
                    {{ Auth::user()->username }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title " id="waktu_log">Logged in  5 min ago</div>
                @if (Auth::user()->role == "siswa")
                     <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile</a></a>
                @endif
                {{-- <form action="{{ route('logout') }}" method="POST">
                    @csrf --}}
                    <a type="#" id="logout"  class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Kembali ke Dashboard
                </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
<input type="hidden" name="" id="jumlah_notif" value="{{count($notifUnread)}}">
@if(auth()->user()->role == 'tu' )


<script>

var notifUnread = $('#jumlah_notif').val();


for (var i = 0; i < notifUnread; i++) {
  setTimeout(function() {
      $(".beep").animate({opacity:0},700,"linear",function(){
         $(this).animate({opacity:5},700);
      });
  }, 1500 * i);
}


// setInterval("notificationTime();",1000);
//     function notificationTime(){
//       $('#contentNotif').load(location.href + ' #FeedbackContent');
//       $('#tempatNotif1').load(location.href + ' .message-toggle');

//     }



function sendMarkRequest(id) {
        return $.ajax("{{ route('markNotification.mark') }}", {
            method: 'POST',
            data: {
              "_token": "{{ csrf_token() }}",
            "id":id


            }
        });


    }

    $(document).ready(function () {
      $('#FeedbackContent').click(function() {
          let request = sendMarkRequest($(this).data('id'));
          request.done(() => {
              $(this).parents('a.dropdown-item-unread').remove();
          });
      });


      $('#mark-all').click(function() {
          let request = sendMarkRequest();

          request.done(() => {
              $('a.dropdown-item-unread').remove();
          })
      });

    });

    // $(function() {
    // });


</script>
@endif

