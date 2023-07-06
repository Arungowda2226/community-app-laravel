<html>
<head>
    <title>Edit Business Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <form method="POST" action="{{url('update/'.$businessEdit->id)}}">
                @csrf
                @method('PUT')
                <div id="formContainer">
                    <div class="form-group row">
                        <label for="OrganisationName" class="col-sm-4 col-form-label">Organisation Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$businessEdit->organisation_name}}" name="inputs[0][OrganisationName]" placeholder="Enter Organisation Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationAddress" class="col-sm-4 col-form-label">Organisation Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$businessEdit->organisation_address}}" name="inputs[0][OrganisationAddress]" placeholder="Enter Organisation Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationState" class="col-sm-4 col-form-label">Organisation State</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$businessEdit->organisation_state}}" name="inputs[0][OrganisationState]" placeholder="Enter Organisation State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationCity" class="col-sm-4 col-form-label">Organisation City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$businessEdit->organisation_city}}" name="inputs[0][OrganisationCity]" placeholder="Enter Organisation City">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationCountry" class="col-sm-4 col-form-label">Organisation Country</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$businessEdit->organisation_country}}" name="inputs[0][OrganisationCountry]" placeholder="Enter Organisation Country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationPhone" class="col-sm-4 col-form-label">Organisation Phone</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" value="{{$businessEdit->organisation_phone}}" name="inputs[0][OrganisationPhone]" placeholder="Enter Organisation Phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationEmail" class="col-sm-4 col-form-label">Organisation Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$businessEdit->organisation_email}}" name="inputs[0][OrganisationEmail]" placeholder="Enter Organisation Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationPhotos" class="col-sm-4 col-form-label">Organisation Photos</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" value="{{$businessEdit->organisation_photos}}" name="inputs[0][OrganisationPhotos]" accept="image/*">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
