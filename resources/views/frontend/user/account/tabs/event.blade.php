<!DOCTYPE html>
<html>
<head>
    <title>Business Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <form method="POST" action="/businessForm">
                @csrf
                <div id="formContainer">
                  <div class="form-group row">
                        <label for="photo" class="col-sm-4 col-form-label">Photo</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" id="photo" name="inputs[0][Photo]" onchange="previewPhoto(event)">
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-2">
                                <img id="photoPreview" src="#" alt="Photo Preview" style="max-width: 200px; max-height: 200px; border-radius: 50%;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="EventName" class="col-sm-4 col-form-label">Event Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][EventName]" placeholder="Enter Event Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDescription" class="col-sm-4 col-form-label">Event Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][EventDescription]" placeholder="Enter Event Description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="EventDateAndTime" class="col-sm-4 col-form-label">Event Date and Time</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="inputs[0][EventDateAndTime]" placeholder="Enter Event Date and Time">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NewAddress" class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="inputs[0][FirstName]" placeholder="Enter First Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Address</label>
                                    <input type="text" class="form-control" name="inputs[0][Address]" placeholder="Enter Address">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">City</label>
                                    <input type="text" class="form-control" name="inputs[0][City]" placeholder="Enter City">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">State</label>
                                    <input type="text" class="form-control" name="inputs[0][State]" placeholder="Enter State">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Country</label>
                                    <input type="text" class="form-control" name="inputs[0][Country]" placeholder="Enter Country">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Pincode</label>
                                    <input type="text" class="form-control" name="inputs[0][Pincode]" placeholder="Enter Pincode">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="BusFaciltiy" class="col-sm-4 col-form-label">Bus Faciltiy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][BusFaciltiy]" placeholder="Enter Bus Faciltiy">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Public/Private" class="col-sm-4 col-form-label">Public/Private</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][Public_Private]" placeholder="Enter  Public/Private">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="Event Price" class="col-sm-4 col-form-label">Event Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][EventPrice]" placeholder="">
                        </div>
                    </div>
 
                    <div class="form-group row">
                    <label for="RegistrationRequired" class="col-sm-4 col-form-label">Registration Required</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="inputs[0][RegistrationRequired]">
                            <option value="--">-----</option>
                            <option value="true">True</option>
                            <option value="false">False</option>
                        </select>
                    </div>

                    </div>
                   <div class="form-group row">
                        <label for="Price Per Member Or Price Per Family" class="col-sm-4 col-form-label">Price Per Member Or Price Per Family</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[0][Public]">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<script>
    function previewPhoto(event) {
        var reader = new FileReader();
        var photoPreview = document.getElementById('photoPreview');

        reader.onload = function() {
            photoPreview.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    }
</script>