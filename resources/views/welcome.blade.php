<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The F Thing - Technical Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-t-md {
                margin-top: 30px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .bold {
                font-weight: bold;
            }
        </style>

        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div>
            <div class="col-md-12 text-center m-b-md">
                <div class="title">
                    The F Thing - Technical Test
                </div>
                <div class="links">
                    <a href="{{ url('/create') }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add User</button></a>
                </div>
            </div>

            @if ($users)
            <div class="col-md-10 offset-md-1">
                <span class="bold">List of Users</span>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Married</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <form method="post" action="/delete/{{ $user->id }}" id="delete-user-id-{{ $user->id }}">@csrf</form>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->is_married }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <a href="{{ url('/update/' . $user->id) }}"
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Update User</button>
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm" form="delete-user-id-{{ $user->id }}" onclick="return confirm('Are you sure you want to delete this user?');" value="Submit"><i class="fa fa-trash"></i> Delete User</button>
                                <!-- <a href="{{ url('/delete/' . $user->id) }}"
                                    <button type="submit" class="btn btn-outline-danger btn-sm" form="delete-user-id-{{ $user->id }}" onclick="return confirm('Are you sure you want to delete this user?');" value="Submit"><i class="fa fa-trash"></i> Delete User</button>
                                </a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="content">There is no available data to display. You can add data through the button(s) above.</div>
            @endif
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
