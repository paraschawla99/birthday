<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>SmartData Enterprises</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="margin-top: 80px">
                <h3>SmartData Enterprises</h3>
                <hr>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                @endif

                <form method="POST" action="{{ route('add') }}">
                    @csrf

                    <div class="form-group">
                      <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="{{ old('fname') }}" >
                      @if ($errors->has('fname'))
                        <span class="help-block" style="color: red">
                          <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                      @endif
                    </div>
                
                    <div class="form-group">
                      <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="{{ old('lname') }}">
                       @if ($errors->has('lname'))
                        <span style="color: red">
                          <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                       @endif
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}" maxlength="10">
                       @if ($errors->has('phone'))
                        <span style="color: red">
                          <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                       @endif
                    </div>

                    <div class="form-group">
                      Date Of Birth<input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="{{ old('dob') }}">
                       @if ($errors->has('dob'))
                        <span style="color: red">
                          <strong>{{ $errors->first('dob') }}</strong>
                        </span>
                       @endif
                    </div>

                    <div class="form-group">
                      Date Of Joining<input type="date" class="form-control" name="doj" id="doj" placeholder="Date of Joining" value="{{ old('doj') }}">
                       @if ($errors->has('doj'))
                        <span style="color: red">
                          <strong>{{ $errors->first('doj') }}</strong>
                        </span>
                       @endif
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit">Update</button>

                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#submit").on('click', function() {
                $("#submit").attr('hidden', true)
            }) 
        })
    </script>

</body>
</html>