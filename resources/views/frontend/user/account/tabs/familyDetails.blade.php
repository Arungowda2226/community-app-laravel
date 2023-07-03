<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Member</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div>
        <div>
            <form method="POST" action="/navigate" enctype="multipart/form-data">
                @csrf
                <div id="formContainer">
                    <div class="form-section" id="mainForm">
                        <table class="table table-striped table-hover table-bordered mb-0">
                            <tr>
                                <th>@lang('Name')</th>
                                <td><input type="text" class="form-control" id="name" name="inputs[0][name]" placeholder="Enter Name"></td>
                            </tr>
                            <tr>
                                <th>@lang('Phone')</th>
                                <td><input type="tel" class="form-control" id="phone" name="inputs[0][phone]" placeholder="Enter Phone No"></td>
                            </tr>
                            <tr>
                                <th>@lang('Email')</th>
                                <td><input type="email" class="form-control" id="email"  name="inputs[0][email]" placeholder="Enter Email"></td>
                            </tr>
                            <tr>
                                <th>@lang('Relation')</th>
                                <td><input type="text" class="form-control" id="relation" name="inputs[0][relation]" placeholder="Enter Relation"></td>
                            </tr>
                            <tr>
                                <th>@lang('Photo')</th>
                                <td>
                                    <input type="file" class="form-control" id="photo" name="inputs[0][photo]" onchange="displayPhoto(this, 0)" placeholder="Enter Photo">
                                    <img id="photoPreview0" src="#" alt="Photo Preview" style="max-width: 200px; max-height: 200px; margin-top: 10px; display: none;">
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('DOB')</th>
                                <td><input type="date" class="form-control" id="dob" name="inputs[0][dob]" placeholder="Enter DOB"></td>
                            </tr>
                            <tr>
                                <th>@lang('Married')</th>
                                <td><input type="text" class="form-control" id="married" name="inputs[0][married]" placeholder="Enter Married"></td>
                            </tr>
                            <tr>
                                <th>@lang('Gender')</th>
                                <td><input type="text" class="form-control" id="gender" name="inputs[0][gender]" placeholder="Enter Gender"></td>
                            </tr>
                            <tr>
                                <th>@lang('Origin City')</th>
                                <td><input type="text" class="form-control" id="originCity" name="inputs[0][originCity]" placeholder="Enter OriginCity"></td>
                            </tr>
                            <tr>
                                <th>@lang('Blood Group')</th>
                                <td><input type="text" class="form-control" id="bloodGroup" name="inputs[0][bloodGroup]" placeholder="Enter BloodGroup"></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="form-section">
                        <table id="dynamic_family" class="table table-striped table-hover table-bordered mb-0">
                            
                        </table>
                    </div>
                </div>
                <br><br>
                <button type="button" id="addMoreFamily" class="btn btn-primary float-right">Add more +</button>
                <br><br>
                <button type="submit" class="btn btn-success col-md-2 float-right">Submit</button>
            </form>
        </div>
    </div>
    
    <script>
         $(document).ready(function() {
            var formCount = 0;
            $('#addMoreFamily').click(function() {
                formCount++;
                var newForm = `
                   <table class="table table-striped table-hover table-bordered mb-0">
                    <tr>
                        <th>@lang('Name')</th>
                        <td><input type="text" class="form-control" id="name" name="inputs[${formCount}][name]" placeholder="Enter Name"></td>
                    </tr>
                    <tr>
                        <th>@lang('Phone')</th>
                        <td><input type="tel" class="form-control" id="phone" name="inputs[${formCount}][phone]" placeholder="Enter Phone No"></td>
                    </tr>
                    <tr>
                        <th>@lang('Email')</th>
                        <td><input type="email" class="form-control" id="email"  name="inputs[${formCount}][email]" placeholder="Enter Email"></td>
                    </tr>
                    <tr>
                        <th>@lang('Relation')</th>
                        <td><input type="text" class="form-control" id="relation" name="inputs[${formCount}][relation]" placeholder="Enter Relation"></td>
                    </tr>
                    <tr>
                        <th>@lang('Photo')</th>
                        <td>
                            <input type="file" class="form-control" id="photo" name="inputs[${formCount}][photo]" onchange="displayPhoto(this, ${formCount})" placeholder="Enter Photo">
                            <img id="photoPreview${formCount}" src="#" alt="Photo Preview" style="max-width: 200px; max-height: 200px; margin-top: 10px; display: none;">
                        </td>
                    </tr>
                    <tr>
                        <th>@lang('DOB')</th>
                        <td><input type="date" class="form-control" id="dob" name="inputs[${formCount}][dob]" placeholder="Enter DOB"></td>
                    </tr>
                    <tr>
                        <th>@lang('Married')</th>
                        <td><input type="text" class="form-control" id="married" name="inputs[${formCount}][married]" placeholder="Enter Married"></td>
                    </tr>
                    <tr>
                        <th>@lang('Gender')</th>
                        <td><input type="text" class="form-control" id="gender" name="inputs[${formCount}][gender]" placeholder="Enter Gender"></td>
                    </tr>
                    <tr>
                        <th>@lang('Origin City')</th>
                        <td><input type="text" class="form-control" id="originCity" name="inputs[${formCount}][originCity]" placeholder="Enter OriginCity"></td>
                    </tr>
                    <tr>
                        <th>@lang('Blood Group')</th>
                        <td><input type="text" class="form-control" id="bloodGroup" name="inputs[${formCount}][bloodGroup]" placeholder="Enter BloodGroup"></td>
                    </tr>
                    <tr>
                    <th>
                    <button type="button" class="btn btn-danger remove-table-row float-right">Remove -</button>
                    </th>
                    </tr>
                    </table>
                `;
                $('#dynamic_family').append(newForm);
            });
        });
        $(document).on('click', '.remove-table-row', function() {
    $(this).closest('table').remove();
});

    </script>
</body>
</html>
