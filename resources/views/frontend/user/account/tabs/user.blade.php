<form action="userForm" method='post'>
@csrf
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mb-0">
   <tr>
    <th>@lang('Name')</th>
    <th>@lang('Father Name')</th>
     <th>@lang('Mother Name')</th>
    </tr>
    <tr>
    <td><input type="text" class="form-control" id="Name" name="inputs[0][name]" placeholder="Enter Name"></td>
    <td><input type="text" class="form-control" id="FatherName" name="inputs[0][father_name]" placeholder="Enter FatherName"></td>
    <td><input type="text" class="form-control" id="MotherName" name="inputs[0][mother_name]" placeholder="Enter MotherName"></td>
    </tr>
    <tr>
    <th>@lang('Photo')</th>
    <th>@lang('Phone')</th>
    <th>@lang('Email')</th>
    </tr>
    <tr>
    <td><input type="file" class="form-control" id="Photo" name="inputs[0][photo]"></td>
    <td><input type="tel" class="form-control" id="Phone" name="inputs[0][phone]" placeholder="Enter Phone"></td>
    <td><input type="email" class="form-control" id="Email" name="inputs[0][email]" placeholder="Enter Email"></td>
    </tr>
    <tr>
    <th>@lang('DOB')</th>
    <th>@lang('Gender')</th>
    <th>@lang('Married')</th>
    </tr>
    <tr>
    <td><input type="date" class="form-control" id="DOB" name="inputs[0][DOB]" placeholder="Enter DOB"></td>
    <td><input type="text" class="form-control" id="Gender" name="inputs[0][gender]" placeholder="Enter Gender"></td>
    <td><input type="text" class="form-control" id="Married" name="inputs[0][married]" placeholder="Enter Married"></td>
    </tr>
    <tr>
    <th>@lang('Blood Group')</th>
    <th>@lang('Address')</th>
    <th>@lang('State')</th>
    </tr>
    <tr>
    <td><input type="text" class="form-control" id="BloodGroup" name="inputs[0][blood_group]" placeholder="Enter BloodGroup"></td>
    <td><input type="text" class="form-control" id="Address" name="inputs[0][address]" placeholder="Enter Address"></td>
    <td><input type="text" class="form-control" id="State" name="inputs[0][state]" placeholder="Enter State"></td>
    </tr>
    <tr>
    <th>@lang('City')</th>
    <th>@lang('Pincode')</th>
    <th>@lang('Country')</th>
    </tr>
    <tr>
    <td><input type="text" class="form-control" id="City" name="inputs[0][city]" placeholder="Enter City"></td>
    <td><input type="text" class="form-control" id="Pincode" name="inputs[0][pincode]" placeholder="Enter Pincode"></td>
    <td><input type="text" class="form-control" id="Country" name="inputs[0][country]" placeholder="Enter Country"></td>
    </tr>
    <tr>
    <th>@lang('Origin Address')</th>
    <th>@lang('Origin State')</th>
    <th>@lang('Origin City')</th>
    </tr>
    <tr>
    <td><input type="text" class="form-control" id="OriginAddress" name="inputs[0][origin_address]" placeholder="Enter OriginAddress"></td>
    <td><input type="text" class="form-control" id="OriginState" name="inputs[0][origin_state]" placeholder="Enter OriginState"></td>
    <td><input type="text" class="form-control" id="OriginCity" name="inputs[0][origin_city]" placeholder="Enter OriginCity"></td>
    </tr>
    <tr>
    <th>@lang('Origin Pincode')</th>
    </tr>
    <tr>
    <td><input type="text" class="form-control" id="OriginPincode" name="inputs[0][origin_pincode]" placeholder="Enter OriginPincode"></td>
    </tr>
    </table>
</div>
<br>
<div class="text-center">
<button type="submit" class="btn btn-success col-md-2">Save</button>
</div>
</form>
