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
<div class="container border border-dark" >
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
                            <input type="text" class="form-control border border-dark" name="inputs[0][event_name]" placeholder="Enter Event Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDescription" class="col-sm-4 col-form-label">Event Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control border border-dark" name="inputs[0][event_description]" placeholder="Enter Event Description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDescription" class="col-sm-4 col-form-label">Registration Start Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control border border-dark" name="inputs[0][registration_start_date]" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDescription" class="col-sm-4 col-form-label">Registration End Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control border border-dark" name="inputs[0][registration_end_date]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDateAndTime" class="col-sm-4 col-form-label">Event Date and Time</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control border border-dark" name="inputs[0][event_date_time]" placeholder="Enter Event Date and Time">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NewAddress" class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Name</label>
                                    <input type="text" class="form-control border border-dark" name="inputs[0][name]" placeholder="Enter First Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Address</label>
                                    <input type="text" class="form-control border border-dark" name="inputs[0][address]" placeholder="Enter Address">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">City</label>
                                    <input type="text" class="form-control border border-dark" name="inputs[0][city]" placeholder="Enter City">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">State</label>
                                    <input type="text" class="form-control border border-dark" name="inputs[0][state]" placeholder="Enter State">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Country</label>
                                    <input type="text" class="form-control border border-dark" name="inputs[0][country]" placeholder="Enter Country">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Pincode</label>
                                    <input type="text" class="form-control border border-dark" name="inputs[0][pincode]" placeholder="Enter Pincode">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="BusFaciltiy" class="col-sm-4 col-form-label">Bus Faciltiy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control border border-dark" name="inputs[0][bus_facility]" placeholder="Enter Bus Faciltiy">
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
                            <input type="text" class="form-control border border-dark" name="inputs[0][event_price]" placeholder="0 consider as free">
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
                            <input type="text" class="form-control border border-dark" name="inputs[0][price_per_member]" placeholder="Price Per Member">
                        </div>
                    </div>
                   <div class="form-group row">
                        <label for="Price Per Member Or Price Per Family" class="col-sm-4 col-form-label">age<6 Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control border border-dark" name="inputs[0][age<6_Price]" placeholder="Price below 6 year">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="18belowPrice" class="col-sm-4 col-form-label">age<18 Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control border border-dark" name="inputs[0][age<18_Price]" placeholder="price below 5 year">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="60abovePrice" class="col-sm-4 col-form-label">age>60 Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control border border-dark" name="inputs[0][age>60_Price]" placeholder="Price above 60 year">
                        </div>
                    </div>
                    <div id="addition">
                        <!-- Additional input fields will be added dynamically here -->
                    </div>
                    <button type="button" class="btn btn-warning" onclick="addForm()">Add</button>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
</div>
</body>
<script>
var countEvent = 0;

function addForm() {
    var additionalDetails = `
    <div id="form-${countEvent}" class="additional-form">
        <div class="form-group row">
            <label for="additional_name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control border border-dark" name="additional_name[]" placeholder="Additional name">
            </div>
        </div>
        <div class="form-group row">
            <label for="additional_price" class="col-sm-4 col-form-label">Price</label>
            <div class="col-sm-8">
                <input type="text" class="form-control border border-dark" name="additional_price[]" placeholder="Additional price">
            </div>
        </div>
        <button class="btn btn-danger" onclick="removeForm(${countEvent})">Remove</button>
    </div>
    <br/>
    `;

    document.getElementById("addition").insertAdjacentHTML('beforeend', additionalDetails);
    countEvent++;
}

function removeForm(formId) {
    var formToRemove = document.getElementById(`form-${formId}`);
    if (formToRemove) {
        formToRemove.remove();
    }
}


</script>
</html>

@endsection


