@extends('app')


@section('content')


<div class="container_fluid">
    <div class="row">
        <div class="col-md-3">
            
        <div class ="list-group" style="padding-left: 20px">
            <div class="list-group-item active" style="background-color:#333300"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><b> Dashboard</b></div>    
	<div class = "list-group-item" id="profile">
        <span class="glyphicon glyphicon-book" aria-hidden="true"></span> Your Courses	
             
            <ul class="list-group">
            @foreach($loads as $load)
            <li class="list-group-item"><a href="{{url('viewgrade',array($load->scheduleid,$load->subject))}}">{{ $load->subject }}</a></li>
         @endforeach
        </ul>
                
        </div>
            </div>    
        </div>
        <div class="col-lg-9">
            @if(isset($subjects))
            <h3> Subject : <span style="color:red">{{$currentsubject}}</span></h3>
            <table class="table table-striped" style="padding-right:10px"><tr><td>Student ID</td><td>Student Name</td><td>Prelim</td><td>Midterm</td><td>Semifinal</td><td>Final</td></tr>
                @foreach($subjects as $subject)
                <tr><td>{{$subject->studentid}}</td><td>{{$subject->lastName}}, {{$subject->firstName}}</td>
                    <td>
                        @if($subject->status == '1')
                         <input  type="text" id="prelim"  maxlength="4" size="4" value= "{{$subject->prelim}}" onkeyup="addGrade('{{$subject->id2}}','1', this.value)">
                        @else
                           {{ $subject->prelim }}
                        @endif
                    </td>
                   
                    <td>
                        @if($subject->status == '2')
                        <input type="text" style="text-align:center" id="midterm"  maxlength="4" size="4" value= "{{$subject->midterm}}"  onkeyup="addGrade('{{$subject->id2}}','2', this.value)">
                        @else
                           {{ $subject->midterm }}
                        @endif
                    </td>
                    <td>
                        @if($subject->status == '3')
                         <input type="text" id="semifinals"   style="text-align:center"  maxlength="4" size="4" value= "{{$subject->semifinals}}"  onkeyup="addGrade('{{$subject->id2}}','3', this.value)">
                        @else
                           {{ $subject->semifinals }}
                        @endif
                    </td>
                    <td>
                        @if($subject->status == '4')
                         <input type="text" id="finals" maxlength="4"  style="text-align:center"   size="4" value= "{{$subject->finals}}"  onkeyup="addGrade('{{$subject->id2}}','4', this.value)">
                        @else
                           {{ $subject->finals }}
                        @endif
                    </td>
                    
                    
                </tr>
                @endforeach
            </table>    
            @endif
            
        </div>    
     </div>   
</div>    
<script>
    function addGrade(id, type, value1){
            $.ajax({
            type: "GET", 
            url: "/recording/update/" + id + "/"+ type +"/"+ value1, 
            success:function(data){
                //alert(data);
    }
            });
 }

</script>


@stop