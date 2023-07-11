@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Event Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <form method="POST" action="/eventForm" enctype="multipart/form-data">
                @csrf
                <div id="formContainer">
                  <div class="form-group row">
                        <label for="photo" class="col-sm-4 col-form-label">Photo</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="photo" name="inputs[0][photo]">
                        </div>
                  </div>
                        <div class="form-group row">
                        <label for="EventName" class="col-sm-4 col-form-label">Event Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][event_name]" placeholder="Enter Event Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDescription" class="col-sm-4 col-form-label">Event Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][event_description]" placeholder="Enter Event Description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDescription" class="col-sm-4 col-form-label">Registration Start Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="inputs[0][registration_start_date]" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDescription" class="col-sm-4 col-form-label">Registration End Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="inputs[0][registration_end_date]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDateAndTime" class="col-sm-4 col-form-label">Event Date and Time</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="inputs[0][event_date_time]" placeholder="Enter Event Date and Time">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NewAddress" class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="inputs[0][name]" placeholder="Enter First Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Address</label>
                                    <input type="text" class="form-control" name="inputs[0][address]" placeholder="Enter Address">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">City</label>
                                    <input type="text" class="form-control" name="inputs[0][city]" placeholder="Enter City">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">State</label>
                                    <input type="text" class="form-control" name="inputs[0][state]" placeholder="Enter State">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Country</label>
                                    <input type="text" class="form-control" name="inputs[0][country]" placeholder="Enter Country">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Pincode</label>
                                    <input type="text" class="form-control" name="inputs[0][pincode]" placeholder="Enter Pincode">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="BusFaciltiy" class="col-sm-4 col-form-label">Bus Faciltiy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][bus_facility]" placeholder="Enter Bus Faciltiy">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="invitation" class="col-sm-4 col-form-label">Invitation</label>
                        <div class="col-sm-8">
                            <input type="radio" id="Public" name="inputs[0][invitation]" value="Public">
                            <label for="Public">Public</label><br>
                            <input type="radio" id="Private" name="inputs[0][invitation]" value="Private">
                            <label for="Private">Private</label><br>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="Event Price" class="col-sm-4 col-form-label">Event Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][event_price]" placeholder="0 consider as free">
                        </div>
                    </div>
 
                    <div class="form-group row">
                        <label for="registration" class="col-sm-4 col-form-label">Registration</label>
                        <div class="col-sm-8">
                            <input type="radio" id="True" name="inputs[0][registration]" value="True">
                            <label for="True">True</label><br>
                            <input type="radio" id="False" name="inputs[0][registration]" value="False">
                            <label for="False">False</label><br>
                        </div>
                    </div>
                   <div class="form-group row">
                        <label for="Price Per Member Or Price Per Family" class="col-sm-4 col-form-label">Price Per Member</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][price_per_member]" placeholder="Price Per Member">
                        </div>
                    </div>
                   <div class="form-group row">
                        <label for="Price Per Member Or Price Per Family" class="col-sm-4 col-form-label">Price Per Family</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][price_per_family]" placeholder="Price Per Family">
                        </div>
                    </div>

                    <div id="additionalPrice">
                        <button type="button" onclick="addAdditionalPrice()">Additional Price</button>
                        <br>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
</div>

<script>
    var additionalPriceCount = 0;

    function addAdditionalPrice() {
        additionalPriceCount++;

        var additionalPriceContainer = document.getElementById("additionalPrice");
        
        var label1 = document.createElement("label");
        label1.setAttribute("for", "Name" );
        label1.className = "col-sm-4 col-form-label";
        label1.textContent = "Name"  + ":";

        var input1 = document.createElement("input");
        input1.setAttribute("type", "text");
        input1.className = "form-control";
        input1.setAttribute("name", "inputs[0][additional_name_" + additionalPriceCount + "]");
        input1.setAttribute("placeholder", "Name");

        var label2 = document.createElement("label");
        label2.setAttribute("for", "Price" );
        label2.className = "col-sm-4 col-form-label";
        label2.textContent = "Price " + ":";

        var input2 = document.createElement("input");
        input2.setAttribute("type", "text");
        input2.className = "form-control";
        input2.setAttribute("name", "inputs[0][additional_price_" + additionalPriceCount + "]");
        input2.setAttribute("placeholder", "Additional Price");

        additionalPriceContainer.appendChild(label1);
        additionalPriceContainer.appendChild(input1);
        additionalPriceContainer.appendChild(label2);
        additionalPriceContainer.appendChild(input2);
    }
</script>


</body>
</html>

@endsection
