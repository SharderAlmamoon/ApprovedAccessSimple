<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    @php
        $user = App\Models\User::where('role',0)->get();
    @endphp

    <div class="container">
        <div class="text-end pt-5">
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                   {{Auth::user()->name}}
                </button>
                    <ul class="dropdown-menu">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                        <li>
                           <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>
                         </li>
                     </form>
                    </ul>
                </div>
            </div>
            <div class="text-start">
            <h3>Dashboard</h3>
        </div>

        <div class="row">
              <div class="mt-5">
               <h3>PENDING USER LIST</h3>
               <table class="table">
                 <thead>
                    <tr>
                    <td>#SL</td>
                    <td>USER NAME</td>
                    <td>USER EMAIL</td>
                    <td>Action</td>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($user as $key=>$penduser)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$penduser->name}}</td>
                        <td>{{$penduser->email}}</td>
                        <td>
                            <a href="{{route('approveuser',$penduser->id)}}" class="btn btn-info">Approved</a>
                            <a href="{{route('declineuser',$penduser->id)}}" class="btn btn-danger">Decline</a>
                        </td>
                    </tr>
                    @endforeach
                 </tbody>
               </table>
        </div>
        </div>
    </div>
             
</body>
</html>

