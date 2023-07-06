@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')
<div >
    <div >
        <div >
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
                        <tr data-toggle="modal" data-target="#studentModal" onclick="showPopup({{ $user->id }})">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->father_name }}</td>
                        <td>{{ $user->mother_name }}</td>
                        <td>{{ $user->photo }}</td>
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
                        <td></td>
                        <td></td>
                         </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">{{$userDetails->links()}}</div>
        </div>
    </div>
</div>
<!-- modal pop-up -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Student Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>OrganisationName:</strong> <span id="OrganisationName"></span></p>
                <p><strong>OrganisationAddress:</strong> <span id="OrganisationAddress"></span></p>
                <p><strong>OrganisationState:</strong> <span id="OrganisationState"></span></p>
                <p><strong>OrganisationCity:</strong> <span id="OrganisationCity"></span></p>
                <p><strong>OrganisationCountry:</strong> <span id="OrganisationCountry"></span></p>
                <p><strong>OrganisationPhone:</strong> <span id="OrganisationPhone"></span></p>
                <p><strong>OrganisationEmail:</strong> <span id="OrganisationEmail"></span></p>
                <p><strong>OrganisationPhotos:</strong> <span id="OrganisationPhotos"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function showPopup(userId) {
    $.ajax({
        url: '/user/' + userId,
        method: 'GET',
        success: function(response) {
            if (response.status === 200) {
                var user = response.user;
                $('#OrganisationName').text(user.organisation_name);
                $('#OrganisationAddress').text(user.organisation_address);
                $('#OrganisationState').text(user.organisation_state);
                $('#OrganisationCity').text(user.organisation_city);
                $('#OrganisationCountry').text(user.organisation_country);
                $('#OrganisationPhone').text(user.organisation_phone);
                $('#OrganisationEmail').text(user.organisation_email);
                $('#OrganisationPhotos').text(user.organisation_photos);

                $('#studentModal').modal('show');
            } else {
                console.log('user not found');
            }
        },
        error: function(error) {
            console.log('Request failed');
            console.log(error);
        }
    });
}
    function searchTable() {
        var searchText = $('#searchInput').val().toLowerCase();
        $('table.data-table tbody tr').each(function () {
            var userName = $(this).find('td:nth-child(3)').text().toLowerCase();
            var userPhone = $(this).find('td:nth-child(8)').text().toLowerCase();
            var userEmail = $(this).find('td:nth-child(9)').text().toLowerCase();
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


</script>

@endsection
