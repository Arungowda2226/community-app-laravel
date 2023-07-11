@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')
<link rel="stylesheet" href="D:\xampp\htdocs\laravel-boilerplate-master-check\resources\sass\frontend\allMemverList.scss">
<div>
    <div>
        <div>
            <h1>Members List</h1>
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by Name or Phone or Email" oninput="searchTable()" />
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>FatherName</th>
                        <th>MotherName</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Married</th>
                        <th>BloodGroup</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Country</th>
                        <th>OriginAddress</th>
                        <th>OriginState</th>
                        <th>OriginCity</th>
                        <th>OriginPincode</th>
                        <th>FamilyDetails</th>
                        <th>BusinessDetails</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userDetails as $user)
                    
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->father_name }}</td>
                        <td>{{ $user->mother_name }}</td>
                        <td><img src="/img/{{ $user->photo }}" width="50px" height="50px" alt="img" /></td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->DOB }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->married }}</td>
                        <td>{{ $user->blood_group }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->pincode }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->origin_address }}</td>
                        <td>{{ $user->origin_state }}</td>
                        <td>{{ $user->origin_city }}</td>
                        <td>{{ $user->origin_pincode }}</td>
                        <td><a href="#" data-toggle="modal" data-target="#familyModal" data-userid="{{ $user->id }}">{{ $user->family_count }}</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#businessModal" data-userid="{{ $user->id }}">{{ $user->business_count }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">{{ $userDetails->links() }}</div>
        </div>
    </div>
</div>

<!-- modal pop-up -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
    <!-- Modal content -->
</div>

<!-- Family modal pop-up -->
<div class="modal fade" id="familyModal" tabindex="-1" role="dialog" aria-labelledby="familyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 2000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="familyModalLabel">Family Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Relation</th>
                            <th>Photo</th>
                            <th>DOB</th>
                            <th>Married</th>
                            <th>Gender</th>
                            <th>OriginCity</th>
                            <!-- <th>BloodGroup</th> -->
                        </tr>
                    </thead>
                    <tbody id="familyDetailsTable" class="table table-bordered" style="margin-bottom: 0;">
                        <!-- Family details will be added dynamically here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Business modal pop-up -->
<div class="modal fade" id="businessModal" tabindex="-1" role="dialog" aria-labelledby="businessModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg custom-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="businessModalLabel">Business Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-spacing" style="width:100px">
                    <thead>
                        <!-- <tr>
                            <th>organisation_name</th>
                            <th>organisation_address</th>
                            <th>organisation_state</th>
                            <th>organisation_city</th>
                            <th>organisation_country</th>
                            <th>organisation_phone</th>
                            <th>organisation_email</th>
                            <th>organisation_photos</th>
                        </tr> -->
                    </thead>
                    <tbody id="businessDetailsTable" class="table table-bordered" style="margin-bottom: 0;">
                        <!-- Business details will be added dynamically here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        function searchTable() {
        var searchText = $('#searchInput').val().toLowerCase();
        $('table.data-table tbody tr').each(function() {
            var userName = $(this).find('td:nth-child(1)').text().toLowerCase();
            var userPhone = $(this).find('td:nth-child(5)').text().toLowerCase();
            var userEmail = $(this).find('td:nth-child(6)').text().toLowerCase();
            if (
                userName.indexOf(searchText) !== -1 ||
                userPhone.indexOf(searchText) !== -1 ||
                userEmail.indexOf(searchText) !== -1
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

$(document).ready(function() {
    $('#familyModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var userId = button.data('userid');

        
        // Perform AJAX request to fetch family details
        $.ajax({
            url: '/family/' + userId,
            method: 'GET',
            success: function(response) {
                if (response.status === 200) {
                    var familyDetails = response.familyDetails;
                    var tableBody = $('#familyDetailsTable');

                    tableBody.empty();

                    for (var i = 0; i < familyDetails.length; i++) {
                        var member = familyDetails[i];
                        var imagePath = '/img/' + member.photo;
                        var row = '<tr>' +
                            '<td>' + member.name + '</td>' +
                            '<td>' + member.phone + '</td>' +
                            '<td>' + member.email + '</td>' +
                            '<td>' + member.relation + '</td>' +
                            '<td><img src="' + imagePath + '" width="50px" height="50px" alt="img" /></td>' +
                            '<td>' + member.DOB + '</td>' +
                            '<td>' + member.married + '</td>' +
                            '<td>' + member.gender + '</td>' +
                            '<td>' + member.origin_city + '</td>' +
                            // '<td>' + member.blood_group + '</td>' +
                            '</tr>';

                        tableBody.append(row);
                    }
                } else {
                    console.log('Family details not found');
                }
            },
            error: function(error) {
                console.log('Request failed');
                console.log(error);
            }
        });
    });


  $('#businessModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var userId = button.data('userid');
    console.log(userId);
    
    // Perform AJAX request to fetch business details
    $.ajax({
        url: '/Details/' + userId,
        method: 'GET',
        success: function(response) {
            console.log(response);
            if (response.status === 200) {
                var businessDetails = response.Details;
                var tableBody = $('#businessDetailsTable');
               
                
                tableBody.empty();

                for (var i = 0; i < businessDetails.length; i++) {
                    var business = businessDetails[i];
                     var busImagePath = '/img/' + business.organisation_photos;
                    var row = '<tr>' +
                        '<th>organisation_name</th>' +
                        '<td>' + business.organisation_name + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>organisation_address</th>' +
                        '<td>' + business.organisation_address + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>organisation_state</th>' +
                        '<td>' + business.organisation_state + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>organisation_city</th>' +
                        '<td>' + business.organisation_city + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>organisation_country</th>' +
                        '<td>' + business.organisation_country + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>organisation_phone</th>' +
                        '<td>' + business.organisation_phone + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>organisation_email</th>' +
                        '<td>' + business.organisation_email + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>organisation_photos</th>' +
                        '<td><img src="' + busImagePath + '" width="50px" height="50px" alt="img" /></td>' +
                        '</tr>'+
                        '<tr><td colspan="2"><br></td></tr>';
                        

                    tableBody.append(row);
                }
            } else {
                console.log('Business details not found');
            }
        },
        error: function(error) {
            console.log('Request failed');
            console.log(error);
        }
    });
});


});



</script>

@endsection
