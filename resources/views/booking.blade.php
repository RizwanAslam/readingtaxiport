@extends('layout')
@section('content')
<div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                  40% Complete (info)
            </div>
        </div>
        <h1 style='color: #25a2c3; text-align:center'>Booking Options</h1>
            <div class="row">
                <form method="POST" action="{{url('/customer')}}">
                    <div class="col-md-6">
                        <div style='visibility:hidden'>
                            <input name='location_id' value='{{$record->id}}'/>
                        </div>
                    {{csrf_field()}}
                        <div class='form-group'>
                            <h3>Enter Vehical Type<h3>
                            <select name="vehicalType" class='form-control' required>
                                <option value="" hidden>vehical type...</option>
                                <option value="saloon">Saloon</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <h3>No. of Occupants<h3>
                            <select name="occupants" class='form-control' required>
                                <option value="" hidden>No of Occupants....</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <h3>No. of Small Luggages<h3>
                            <select name="luggage" class='form-control'>
                                <option value="" hidden>No of items....</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <h3>No. of Suitcase Items<h3>
                            <select name="suitcase" class='form-control'>
                                <option value="" hidden>No of items....</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <h3>Journey Type<h3>
                            <select name="journey" id='journey' class='form-control' required>
                                <option value="" hidden>journey type...</option>
                                <option value="oneway">oneway</option>
                                <option value="return">return</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h3>Date And Time<h3>
                            <div class='input-group date form-control'>
                                <input type='text' name='datetime' class="form-control"  id='datetimepicker1' required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker1').datetimepicker({
                                            formate:'y-m-d H:1',
                                            value:'2019-8-11 9:00'
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <div style='visibility:hidden'>
                            <input name='cost' class="form-control" id="cost"/>
				        </div>
                    </div>
                    <div class="col-md-2">
                            <!-- for alignment -->
                    </div>
                    <div class="col-md-4">
                            <ul class="actions">
                             <button type="button" id='estimate'onclick="displaycost()" class="btn btn-danger">Estimate cost</button>
                            </ul>
                           
                           <script>
                                function displaycost() {
                                    var journey= document.getElementById("journey").value;
                                    if(journey!=""){
                                        var miles={{$record->distance}};
                                        var base=6;
                                        var fare=1.35;
                                        if(miles==1){
                                            if(journey=='return'){
                                                    base*=2;
                                            }
                                            //inserting base fare
                                            document.getElementById("cost").innerHTML ="£"+base;
                                        }
                                        else{
                                            for(var i=1;i<miles;i++){
                                                base+=fare;
                                                //ownword fare icremented by 1.35£ 
                                            }
                                            if(journey=='return'){
                                                    base*=2;
                                            }
                                            document.getElementById("showcost").innerHTML ='<h3>'+'cost:'+'£'+base.toFixed(2)+'<br>Distance:'+miles+'  Miles'+'</h3>';
                                            document.getElementById("cost").value=base.toFixed(2);
                                            document.getElementById("submit").style.visibility= "visible";
                                        }
                                    }
                                    
                                }
                            </script>
                            <div class='container' id='showcost'>
                            </div> 
                            <ul class="actions" id='submit' style="visibility: hidden">
                                   <input type='submit' value='Next To Book'/>
                             </ul>
                    </div>
                </form>
            </div>
</div>
@endsection('content')