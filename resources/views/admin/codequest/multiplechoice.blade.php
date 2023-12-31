<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "/apdicon.png">
    <link rel="stylesheet" href = "/admin/admincodequest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>APD SecretOffice: Challenges (Multiple Choice)</title>
</head>
<body>
    @if(!session('adminsuccess'))
        <script>
            window.location.href="/loginpage";
        </script>
    @endif
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="fa-solid fa-user-secret"></i>
                <span>APD SecretOffice</span>
            </div>
            <i class="fa-solid fa-bars" id = "btn"></i>
        </div>
        <div class="user">
            <img src = "{{ Auth::guard('admins')->user()->avatar??'Image not set'}}" alt="secret-user" class = "user-img">
            <div class="">
                <p class = "bold">{{Auth::guard('admins')->user()->firstname??'Firstname not set'}}</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href = "/admindashboard">
                    <i class="fa-solid fa-grip"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href = "/adminchallenges">
                    <i class="fa-solid fa-font-awesome"></i>
                    <span class="nav-item">Challenges</span>
                </a>
                <span class="tooltip">Challenges</span>
            </li>
            <li>
                <a href = "/adminsubmissions">
                    <i class="fa-solid fa-file-code"></i>
                    <span class="nav-item">Submissions</span>
                </a>
                <span class="tooltip">Submissions</span>
            </li>
            <li>
                <a href = "/adminnews">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="nav-item">News</span>
                </a>
                <span class="tooltip">News</span>
            </li>
            <li>
                <a href = "/adminusers">
                    <i class="fa-solid fa-users"></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>
            <li>
                <a href = "/adminadmins">
                    <i class="fa-solid fa-user-secret"></i>
                    <span class="nav-item">Admins</span>
                </a>
                <span class="tooltip">Admins</span>
            </li>
            <li>
                <a href = "/adminlogout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <h1><a href="/adminchallenges">Challenges</a>/Multiple Choice</h1>
        <button onclick="window.location.href='/adminchallenges/multiplechoice/post'">Post Challenge</button>
        <div class="container-multiplechoice">
            @if(!empty($quiz))
                <section class="table_body">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Difficulty</th>
                                <th>Points</th>
                                <th>Status</th>
                                <th>Publish</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $colorDiff='';
                            $no=0;
                        @endphp
                        @foreach($quiz as $content)
                            @php
                                $difficulty=$content->difficulty;
                                switch($difficulty){
                                    case 'easy':
                                        $colorDiff='green';
                                        break;
                                    case 'medium':
                                        $colorDiff='orange';
                                        break;
                                    case 'hard':
                                        $colorDiff='red';
                                        break;
                                }
                                $colorStatus=($content->status=="inactive")?'red':'green';
                            @endphp
                            <tr>
                                <td>{{ $content->id}}</td>
                                <td>{{ $content->title}}</td>
                                <td style="color:{{$colorDiff}}">{{ $content->difficulty}}</td>
                                <td>{{ $content->points}}</td>
                                <td style="color:{{$colorStatus}}">{{ $content->status}}</td>
                                <td>
                                    @if($content->status=="inactive") 
                                        <a onclick="activate({{$content->id}},'inactive')">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </a>
                                    @else
                                        <a onclick="activate({{$content->id}},'active')">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="promptDeletePost({{$content->id}})"><i class="fa-solid fa-trash"></i></a>
                                    <a href="/adminchallenges/multiplechoice/editpost/{{$content->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </section>
            @else
                <section class="table_body" style="background-color:transparent">
                    There are no posted multiple choice challenges!
                </section>
            @endif
        </div>
    </div>


    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
        function activate(id,status){
            $.ajax({
                type:"POST",
                url:"/update-multiplechoice-status",
                data:{
                    'id':id,
                    'status':status
                },
                success:function(response){
                    if(response.success){
                        location.reload();
                    }
                    else{
                        console.log('Failed to update multiplechoice status data');
                    }
                },
                error:function(error){
                    console.error('Update multiplechoice status error ',error);
                }
            });
        }
        function promptDeletePost(id){
            Swal.fire({
                icon:'question',
                title: `Are you sure you want to remove post no ${id} entries?`,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass:{
                    confirmButton:'change-width-confirm-button',
                    cancelButton:'change-width-confirm-button'
                },
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire({
                        icon:'success',
                        title:`Post Id ${id} removed`,
                        customClass:{
                            confirmButton:'change-width-confirm-button',
                        },
                    }).then((result)=>{
                      if(result.isConfirmed){
                        deletePost(id);
                      }  
                    });
                }
            })
        }
        function deletePost(id){
             $.ajax({
                type:'POST',
                url:'/delete-multiplechoice-post',
                data:{
                    'id':id
                },
                success:function(response){
                    if(response.success){
                        location.reload();
                    }
                },
                error:function(error){
                    console.error('Delete post request error ',error);
                }
            });
        }
    </script>


</body>
</html>