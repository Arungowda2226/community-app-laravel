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
           
            <form id="businessForm" method="POST" action="/businessForm">
                 @method('POST')
                @csrf
                @foreach($business_details as $index => $business)
                <div id="formContainer">
                    <div class="form-group row">
                        <label for="OrganisationName" class="col-sm-4 col-form-label">Organisation Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"   value="{{$business->organisation_name}}" placeholder="Enter Organisation Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationAddress" class="col-sm-4 col-form-label">Organisation Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{$business->organisation_address}}" placeholder="Enter Organisation Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationState" class="col-sm-4 col-form-label">Organisation State</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{$business->organisation_state}}" placeholder="Enter Organisation State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationCity" class="col-sm-4 col-form-label">Organisation City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{$business->organisation_city}}" placeholder="Enter Organisation City">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationCountry" class="col-sm-4 col-form-label">Organisation Country</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{$business->organisation_country}}" placeholder="Enter Organisation Country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationPhone" class="col-sm-4 col-form-label">Organisation Phone</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control"  value="{{$business->organisation_phone}}" placeholder="Enter Organisation Phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationEmail" class="col-sm-4 col-form-label">Organisation Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{$business->organisation_email}}" placeholder="Enter Organisation Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationPhotos" class="col-sm-4 col-form-label">Organisation Photos</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control"  value="{{$business->organisation_photos}}" accept="image/*">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="inputs[{{$index}}][form_id]" value="{{$business->id}}">
                <button type="button" class="btn btn-danger removeMain" data-index="{{$index}}" >remove</button>
                <br><br>
                
                  @endforeach
                  
                <div id="dynamicForm">

                </div>
               <div class="container">
                <div class="row">
                    <div class="col text-start">
                    <button type="button" id="updateButton" class="btn btn-warning">Update</button>
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="col text-end">
                        <button type="button" id="add" class="btn btn-primary">Add+</button>
                    </div>
                </div>
              </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var formCount = 0;

        $('#add').click(function() {
            formCount++;
            var newForm = `
            <div class="my-4"></div>
                <div class="dynamic-form-group">
                    <div class="form-group row">
                        <label for="OrganisationName${formCount}" class="col-sm-4 col-form-label">Organisation Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[${formCount}][organisation_name]" placeholder="Enter Organisation Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationAddress${formCount}" class="col-sm-4 col-form-label">Organisation Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[${formCount}][organisation_address]" placeholder="Enter Organisation Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationState${formCount}" class="col-sm-4 col-form-label">Organisation State</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[${formCount}][organisation_state]" placeholder="Enter Organisation State">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationCity${formCount}" class="col-sm-4 col-form-label">Organisation City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[${formCount}][organisation_city]" placeholder="Enter Organisation City">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationCountry${formCount}" class="col-sm-4 col-form-label">Organisation Country</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[${formCount}][organisation_country]" placeholder="Enter Organisation Country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationPhone${formCount}" class="col-sm-4 col-form-label">Organisation Phone</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" name="inputs[${formCount}][organisation_phone]" placeholder="Enter Organisation Phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationEmail${formCount}" class="col-sm-4 col-form-label">Organisation Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputs[${formCount}][organisation_email]" placeholder="Enter Organisation Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="OrganisationPhotos${formCount}" class="col-sm-4 col-form-label">Organisation Photos</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="inputs[${formCount}][organisation_photos]" accept="image/*">
                        </div>
                    </div>
                    <div>
                    <button type="button" class="btn btn-danger remove">Remove</button>
                    </div>
                </div> 
                <div class="my-4"></div>
            `;
            $('#dynamicForm').append(newForm);
        });

        $(document).on('click', '.remove', function() {
            console.log("removed");
            if (formCount > 0) {
                $(this).closest('.dynamic-form-group').remove();
                formCount--;
            }
        });
        $(document).on('click', '.removeMain', function() {
            var index = $(this).data('index');
            var formId = $('input[name="inputs[' + index + '][form_id]"]').val();
            var confirmation = confirm("Are you sure you want to remove");
            if (confirmation === true) {
            $('#formContainer' + index).remove();

            $.ajax({
                url: '/delete/' + formId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function(response) {
                    console.log("deleted");
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
        });

        
    $('#updateButton').click(function() {
        // Create an empty array to store the form data
        var formData = [];

        // Loop through each form container
        $('.formContainer').each(function(index) {
            // Create an empty object to store the form data for the current container
            var form = {};

            // Get the values from the input fields within the current container
            form.organisation_name = $(this).find('input[name="inputs[' + index + '][organisation_name]"]').val();
            form.organisation_address = $(this).find('input[name="inputs[' + index + '][organisation_address]"]').val();
            form.organisation_state = $(this).find('input[name="inputs[' + index + '][organisation_state]"]').val();
            form.organisation_city = $(this).find('input[name="inputs[' + index + '][organisation_city]"]').val();
            form.organisation_country = $(this).find('input[name="inputs[' + index + '][organisation_country]"]').val();
            form.organisation_phone = $(this).find('input[name="inputs[' + index + '][organisation_phone]"]').val();
            form.organisation_email = $(this).find('input[name="inputs[' + index + '][organisation_email]"]').val();
            // Add more form fields if needed

            // Push the form data object to the array
            formData.push(form);
            
        });
            
        // Send the form data to the server using AJAX
        $.ajax({
            url: '/update', // Replace with your server-side route
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                formData: formData
            },
            success: function(response) {
                console.log(formData);
                console.log("Data updated successfully");
                // Handle the success response as needed
            },
            error: function(xhr) {
                console.log(formData);
                console.log(xhr.responseText);
                // Handle the error response as needed
            }
        });
    });


    });
</script>
</body>
</html>
