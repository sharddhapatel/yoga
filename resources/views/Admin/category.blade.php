@extends('Admin.header_footer')
@section('title')
Category
@endsection
@section('content')

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <br><br>
                  <div  style="float: left;">
                       <button type="submit" class="btn btn-primary"><a href="{{ url('showcategory') }}" style="color: white;">Show Category</a></button> 
                    </div>
                      <br><br>
                    <div class="login-content">
                        <!-- <div class="login-logo">
                            <h4>Category</h4>
                        </div> -->
                        <div class="login-form">

                           @if(Session::has('message'))
                      <div class="alert alert-success">
                          <i class="fa-lg fa fa-warning"></i>
                          {!! session('message') !!}
                      </div>
                      @elseif(Session::has('error'))
                      <div class="alert alert-danger">
                          <i class="fa-lg fa fa-warning"></i>
                          {!! session('error') !!}
                      </div>
                      @endif
                      
                    <form class="form-horizontal" action="{{ url('insertcategory')}}" method="post">
                          {{ csrf_field() }}
                      <div class="form-group">
                       
                      <label>Category Name</label>
                      <input type="text" class="form-control" placeholder=" Category Name"  onkeypress="return checkNum(event)"  name="cname" id="cname" ><p id="cname_validation"></p>
                      </div>
                      

                              
                       <br><br>
                      <div class="form-group row">
                        <div class="offset-sm-0 col-sm-10">
                         <button type="submit" class="btn btn-success">Save Category</button> <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                      </div>
                    </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type ="text/javascript">



function checkNum(event)
{
    if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123)  || event.keyCode == 8 || event.keyCode == 32) 
    {
        return true;
    } 
    else
    {
        return false;
    }

}
 
$("#cname").focusout(function()
   {
      var cname = $("#cname").val();
   if(cname == '')
   {
      $("#cname").css({"border-color": "red", "border-style":"solid"});
      document.getElementById("cname_validation").innerHTML = "<font style=color:red> Please enter cname</font>";
   }
   else 
     {
      var a=/^[A-Za-z\s]+$/;

      if(!cname.match(a))
      {
         $("#cname").css({"border-color": "red","border-style":"solid"});
      document.getElementById("cname_validation").innerHTML = "<font style=color:red>Name can have only alphabets, spaces and dashes</font>";
      }
      else
      {
         $("#name").css({"border-color": "black","border-style":"solid"});
      document.getElementById("name_validation").innerHTML = "<font style=color:white></font>";
      }

   }
});


</script>
  @endsection


