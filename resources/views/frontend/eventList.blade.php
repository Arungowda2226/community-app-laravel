@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')
<style>
.smaller-width {
  width: 20px;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/@open-wa/wa-automate@1.9.2/dist/index.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUWbWu3SZRtS5T_LRFOFzAeHj9lMASJCM&libraries=places"></script>

<div>
    <div>
        <div>
            <h1>Event List</h1>
            <div>
            <div class="row">
            <div class="col-sm-4">
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by Name, Event Name, Address, or Event Date" oninput="searchTable()" />
            </div>
            </div>
                <div class="input-group">
                    <label for="startDateInput" style="display: flex; align-items: center; margin-right: 5px; font-weight: bold;">From date:</label>
                    <div class="row">
                    <div class="col-sm-4">
                    <input type="date" id="startDateInput" class="form-control custom-input" style="width: 50px;" placeholder="Start Date">
                    </div>
                    </div>
                    <label for="endDateInput" style="display: flex; align-items: center; margin-left: 10px; margin-right: 5px; font-weight: bold;">To date:</label>
                    <div class="row">
                    <div class="col-sm-4">
                    <input type="date" id="endDateInput" class="form-control custom-input" style="width: 50px;" placeholder="End Date">
                    </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="filterByDateRange()">Filter</button>
                </div>

            </div>
            <br>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>photo</th>
                        <th>event_name</th>
                        <th>event_description</th>
                        <th>registration_start_date</th>
                        <th>registration_end_date</th>
                        <th>event_date_time</th>
                        <th>name</th>
                        <th>address</th>
                        <th>city</th>
                        <th>state</th>
                        <th>country</th>
                        <th>pincode</th>
                        <th>bus_facility</th>
                        <th>invitation</th>
                        <th>event_price</th>
                        <th>registration_required</th>
                        <th>price_per_member</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventList as $event)
                    <tr>
                        <td><img src="{{ asset('storage/' . $event->photo) }}" alt="Event Photo" style="max-width: 100px; max-height: 100px;"></td>
                        <td>{{ $event->event_name }}</td>
                        <td>{{ $event->event_description }}</td>
                        <td>{{ $event->registration_start_date }}</td>
                        <td>{{ $event->registration_end_date }}</td>
                        <td>{{ $event->event_date_time }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->address }}</td>
                        <td>{{ $event->city }}</td>
                        <td>{{ $event->state }}</td>
                        <td>{{ $event->country }}</td>
                        <td>{{ $event->pincode }}</td>
                        <td>{{ $event->bus_facility }}</td>
                        <td>{{ $event->invitation }}</td>
                        <td>{{ $event->event_price }}</td>
                        <td>{{ $event->registration_required }}</td>
                        <td>{{ $event->price_per_member }}</td>
                        <td><a href="/paymentGateway/{{ $event->id }}" class="ml-2">Pay</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$eventList->Links()}}
            <div id="mapContainer"></div>
        </div>
    </div>
</div>



<script>
    function searchTable() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toUpperCase();
        var table = document.querySelector(".data-table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) { 
            var cells = rows[i].getElementsByTagName("td");
            var match = false;
            for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
                if (cell) {
                    var value = cell.textContent || cell.innerText;
                    if (value.toUpperCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }
            }
            rows[i].style.display = match ? "" : "none";
        }
    }

function filterByDateRange() {
    var startDate = document.getElementById("startDateInput").value;
    var endDate = document.getElementById("endDateInput").value;
    var table = document.querySelector(".data-table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { 
        var startDateCell = rows[i].getElementsByTagName("td")[3]; 
        var endDateCell = rows[i].getElementsByTagName("td")[4]; 

        if (startDateCell && endDateCell) {
            var start = startDateCell.textContent || startDateCell.innerText;
            var end = endDateCell.textContent || endDateCell.innerText;

            if (start >= startDate && end <= endDate) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}


</script>
@endsection
