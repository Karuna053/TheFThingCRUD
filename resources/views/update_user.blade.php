<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The F Thing - Update User</title>

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

            .red-text-alert {
                color: #dc3545;
            }

            .red-border-alert {
                border: 1px solid #dc3545;
            }
        </style>

        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
        <!-- <div class="<flex-center position-ref full-height"> -->
        <div>
            <div class="col-md-12 text-center m-b-md">
                <div class="title">
                    The F Thing - Update User
                </div>

                <div class="links">
                    <a href="{{ url('/') }}"><button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-angle-double-left"></i> Back to Homepage</button></a>
                </div>
            </div>

            <div class="col-md-8 offset-md-2">
                <form method="post" action="/update/{{ $user->id }}/submit" name="dataForm">
                    @csrf
                    <div class="form-group @error('name') red-text-alert @enderror">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') red-border-alert @enderror" name="name" value="{{ old('name') ?? $user->name }}" required>
                        @error('name')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group @error('email') red-text-alert @enderror">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control @error('email') red-border-alert @enderror" name="email" value="{{ old('email') ?? $user->email }}" required>
                        @error('email')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group @error('password') red-text-alert @enderror">
                        <label for="password">Password (leave blank if unchanged)</label>
                        <input type="password" class="form-control @error('password') red-border-alert @enderror" name="password" required>
                        @error('password')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- <div class="form-group @error('name') red-text-alert @enderror">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm password">
                    </div> -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @error('gender') red-text-alert @enderror">
                                <label for="gender">Gender</label>
                                <select class="custom-select @error('gender') red-border-alert @enderror" name="gender" required>
                                    <option value="">Choose...</option>
                                    <option value="Male" @if(old('gender') ?? $user->gender == "Male") selected @endif>Male</option>
                                    <option value="Female" @if(old('gender') ?? $user->gender == "Female") selected @endif>Female</option>
                                </select>
                                @error('gender')
                                <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group @error('is_married') red-text-alert @enderror">
                                <label for="is_married">Is Married</label>
                                <select class="custom-select @error('is_married') red-border-alert @enderror" name="is_married" value="{{ old('is_married') }}" required>
                                    <option value="">Choose...</option>
                                    <option value="Yes" @if(old('is_married') ?? $user->is_married == "Yes") selected @endif>Yes</option>
                                    <option value="No" @if(old('is_married') ?? $user->is_married == "No") selected @endif>No</option>
                                </select>
                                @error('is_married')
                                <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group @error('address') red-text-alert @enderror">
                        <label for="address">Address</label>
                        <textarea class="form-control @error('address') red-border-alert @enderror" rows="3" name="address" required>{{ old('address') ?? $user->address }}</textarea>
                        @error('address')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Update User</button>
                </form>
            </div>


            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
