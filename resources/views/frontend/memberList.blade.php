@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Members List</h1>
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by Name or Phone or Email" oninput="searchTable()" />
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>organisation_name</th>
                        <th>organisation_address</th>
                        <th>organisation_state</th>
                        <th>organisation_city</th>
                        <th>organisation_country</th>
                        <th>organisation_phone</th>
                        <th>organisation_email</th>
                        <th>organisation_photos</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($businessDetails as $business)
                        <tr data-toggle="modal" data-target="#studentModal" onclick="showPopup({{ $business->id }})">
                        <td>{{ $business->organisation_name }}</td>
                        <td>{{ $business->organisation_address }}</td>
                        <td>{{ $business->organisation_state }}</td>
                        <td>{{ $business->organisation_city }}</td>
                        <td>{{ $business->organisation_country }}</td>
                        <td>{{ $business->organisation_phone }}</td>
                        <td>{{ $business->organisation_email }}</td>
                        <td>{{ $business->organisation_photos }}</td>
                        <td>
                            <a href="{{url('edit/'.$business->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('edit/'.$business->id)}}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">{{$businessDetails->links()}}</div>
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
function showPopup(businessId) {
    $.ajax({
        url: '/business/' + businessId,
        method: 'GET',
        success: function(response) {
            if (response.status === 200) {
                var business = response.business;
                $('#OrganisationName').text(business.organisation_name);
                $('#OrganisationAddress').text(business.organisation_address);
                $('#OrganisationState').text(business.organisation_state);
                $('#OrganisationCity').text(business.organisation_city);
                $('#OrganisationCountry').text(business.organisation_country);
                $('#OrganisationPhone').text(business.organisation_phone);
                $('#OrganisationEmail').text(business.organisation_email);
                $('#OrganisationPhotos').text(business.organisation_photos);

                $('#studentModal').modal('show');
            } else {
                console.log('Business not found');
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
            var businessName = $(this).find('td:nth-child(3)').text().toLowerCase();
            var businessPhone = $(this).find('td:nth-child(8)').text().toLowerCase();
            var businessEmail = $(this).find('td:nth-child(9)').text().toLowerCase();
            if (
                businessName.indexOf(searchText) !== -1 ||
                businessPhone.indexOf(searchText) !== -1 ||
                businessEmail.indexOf(searchText) !== -1
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }


</script>

@endsection
