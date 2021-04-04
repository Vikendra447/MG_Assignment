<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
   #cancelButton{
      color:none;
      background-color: #6d7377;
    border-color: #6d7377;}
  </style>
</head>
<body>

<div class="container">
  <h2 style="text-align:center;">Edit Employee</h2>
  <form method="POST" id="editEmployee" name="editEmployee" action="{{ url('save-employee').'/'.$employee['id'] }} }}">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="@if($employee['name']) {{ $employee['name'] }} @else {{ old('name') }} @endif" placeholder="Enter Name">
    </div>
    <span id="errormsg-name" style="display:none; color: red;">This field is required.</span>

    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="@if($employee['email']) {{ $employee['email'] }} @else {{ old('email') }} @endif" placeholder="Enter email">
    </div>
    <span id="errormsg-email" style="display:none; color: red;">This field is required.</span>

    <div class="form-group">
      <label for="number">Number</label>
      <input type="text" class="form-control" id="number" name="number" value="@if($employee['number']) {{ $employee['number'] }} @else {{ old('number') }} @endif" placeholder="Enter Number">
    </div>
    <span id="errormsg-number" style="display:none; color: red;">This field is required.</span>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="@if($employee['password']) {{ $employee['password'] }} @else {{ old('password') }} @endif" placeholder="Password">
    </div>
    <span id="errormsg-password" style="display:none; color: red;">This field is required.</span>

    <div class="form-group">
      <label for="datepicker">Date of Birth</label>
        <input type="text" id="datepicker" class="form-control" name="dob" value="@if($employee['date_of_birth']) {{ $employee['date_of_birth'] }} @else {{ old('dob') }} @endif"></p>
    </div>
    <span id="errormsg-dob" style="display:none; color: red;">This field is required.</span>

    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="status" name="status" value="@if($employee['status']) {{ $employee['status'] }} @else {{ old('status') }} selected @endif">
        <option value="1">Enable</option>
        <option value="2">Disable</option>
      </select>
    </div>
    <span id="errormsg-status" style="display:none; color: red;">This field is required.</span>
    
    <div class="form-group">
      <label for="picture">Profile Picture</label>
      <input type="file" class="form-control-file" id="picture" name="picture" value="@if($employee['picture']) {{ $employee['picture'] }} @else {{ old('picture') }} @endif">
     </div>
     <span id="errormsg-name" style="display:none; color: red;">This field is required.</span>
     <button type="submit" class="btn btn-primary">Submit</button>
     <button type="button" id="cancelButton" class="btn btn-primary" onclick="window.location='{{ url('/') }}'">Cancel</button>
</form>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
  
  $("#addEmployee").validate({
      rules : {
          'name' : { 'checkblank' : true},
          'email' : {
            'checkblank':true,
          'checkemail':true
          },
          'number' : {
              'checkblank' : true,
              'phone' : true,
          },
          'password' : {'checkblank' : true},
          'dob' : {'checkblank' : true},
          'status' : {'checkblank' : true},
          'picture' : {
            'checkblank' : true,
            'checkimage':true},
      },
        
          submitHandler: function (form) {
              $("#editEmployee").submit();
          }
      });

        $.validator.addMethod("checkblank", function (value) {
            return ($.trim(value).length > 0);
        }, 'This field is required.');

        $.validator.addMethod("phone", function (value) {
            return /^[0-9]{1,10}$/.test(value);
        }, 'This field can contain at most 10 digits.');

        $.validator.addMethod("checkemail", function (value) {
          const reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
          return reg.test(String(value).toLowerCase());
        }, 'Enter valid email address');

        $.validator.addMethod("checkimage", function (value) {
          const extension=(value.substring(value.lastIndexOf("."),value.length)).toLowerCase(); 
          return !((extension !='.png') && (extension !='.jpg'))
        }, 'Upload JPG/PNG types picture');


        $( function() {
          $( "#datepicker" ).datepicker({
            dateFormat:'yy-mm-dd'
          });
        });

</script>
</body>
</html>
