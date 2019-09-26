
<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
	<title>View Employee Records </title>
	</head>
	<body>
        <div class="container">
            <h1 style="text-align: center;">All Employees</h1>
    		<table class="table table-bordered" id="myTable" border="2">
    			<thead>
                    <tr>
        				<td>S.No</td>
        				<td>First Name</td>
        				<td>Last Name</td>
        				<td>Phone Number</td>
        				<td>date of birth</td>
        				<td>date of joining</td>
        			</tr>
                </thead>
                <tbody>
        			@foreach ($employees as $employee)
        			<tr>
        				<td>{{ $employee->id }}</td>
        				<td>{{ $employee->fname }}</td>
        				<td>{{ $employee->lname }}</td>
        				<td>{{ $employee->phone }}</td>
        				<td>{{ $employee->dob }}</td>
        				<td>{{ $employee->doj }}</td>
        			</tr>
        			@endforeach
                </tbody>
    		</table>
            <button class="btn" style="width: 120px; height: 50px; border: 2px solid #4CAF50;">
                        Show
                        </button>
                      
            <table class="table table-bordered" id="myTable1" border="2">
               <thead>
                    <tr>
                        <td>S.No</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Phone Number</td>
                        <td>date of birth</td>
                        <td>date of joining</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filterUser as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->doj }}</td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script type="text/javascript">
    $(".btn").click(function() {
  
   var lable = $(".btn").text().trim();

   if(lable == "Hide") {
     $(".btn").text("Show");
     $("#myTable1").hide();
   }
   else {
     $(".btn").text("Hide");
     $("#myTable1").show();
   }
    
  });




</script>
	</body>
</html>
