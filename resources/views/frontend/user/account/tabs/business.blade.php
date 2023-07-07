<div class="table-responsive">
    @if ($business_details->isEmpty())
        <form action="businessForm" method='post'>
        @csrf
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0">
                <tr>
                    <th>organisation_name</th>
                    <td><input type="text" class="form-control" id="organisation_name" name="inputs[0][organisation_name]" placeholder="Enter organisation_name"></td>
                </tr>
                <tr>
                    <th>organisation_address</th>
                    <td><input type="text" class="form-control" id="organisation_address" name="inputs[0][organisation_address]" placeholder="Enter organisation_address"></td>
                </tr>
                <tr>
                    <th>organisation_state</th>
                    <td><input type="text" class="form-control" id="organisation_state" name="inputs[0][organisation_state]" placeholder="Enter organisation_state"></td>
                </tr>
                <tr>
                    <th>organisation_city</th>
                    <td><input type="text" class="form-control" id="organisation_city" name="inputs[0][organisation_city]" placeholder="Enter organisation_city"></td>
                </tr>
                <tr>
                    <th>organisation_country</th>
                    <td><input type="text" class="form-control" id="organisation_country" name="inputs[0][organisation_country]" placeholder="Enter organisation_country"></td>
                </tr>
                <tr>
                    <th>organisation_phone</th>
                    <td><input type="text" class="form-control" id="organisation_phone" name="inputs[0][organisation_phone]" placeholder="Enter organisation_phone"></td>
                </tr>
                <tr>
                    <th>organisation_email</th>
                    <td><input type="text" class="form-control" id="organisation_email" name="inputs[0][organisation_email]" placeholder="Enter organisation_email"></td>
                </tr>
                <tr>
                    <th>organisation_photos</th>
                    <td><input type="file" class="form-control" id="organisation_photos" name="inputs[0][organisation_photos]" ></td>
                </tr>
            </table>
        </div>
        <br>
        <div class="text-center">
        <button type="submit" class="btn btn-success col-md-2">Save</button>
        </div>
        </form>

    @else
        @foreach($business_details as $index => $business)
            <form action="{{url('updateBusiness/'.$business->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id[]" value="{{ $business->id }}">
                <table id="business_table{{$index}}" class="table table-striped table-hover table-bordered mb-0">
                    <tr>
                        <th>organisation_name</th>
                        <td><input type="text" class="form-control" value="{{ $business->organisation_name }}" id="organisation_name" name="inputs[{{ $index }}][organisation_name]" placeholder="Enter Name"></td>
                    </tr>
                    <tr>
                        <th>organisation_address</th>
                        <td><input type="text" class="form-control" value="{{ $business->organisation_address }}" id="organisation_address" name="inputs[{{ $index }}][organisation_address]" placeholder="Enter organisation_address"></td>
                    </tr>
                    <tr>
                        <th>organisation_state</th>
                        <td><input type="text" class="form-control" value="{{ $business->organisation_state }}" id="organisation_state" name="inputs[{{ $index }}][organisation_state]" placeholder="Enter organisation_state"></td>
                    </tr>
                    <tr>
                        <th>organisation_city</th>
                        <td><input type="text" class="form-control" value="{{ $business->organisation_city }}" id="organisation_city" name="inputs[{{ $index }}][organisation_city]" placeholder="Enter organisation_city"></td>
                    </tr>
                    <tr>
                        <th>organisation_country</th>
                        <td><input type="text" class="form-control" value="{{ $business->organisation_country }}" id="organisation_country" name="inputs[{{ $index }}][organisation_country]" placeholder="Enter organisation_country"></td>
                    </tr>
                    <tr>
                        <th>organisation_phone</th>
                        <td><input type="text" class="form-control" value="{{ $business->organisation_phone }}" id="organisation_phone" name="inputs[{{ $index }}][organisation_phone]" placeholder="Enter organisation_phone"></td>
                    </tr>
                    <tr>
                        <th>organisation_email</th>
                        <td><input type="text" class="form-control" value="{{ $business->organisation_email }}" id="organisation_email" name="inputs[{{ $index }}][organisation_email]" placeholder="Enter organisation_email"></td>
                    </tr>
                    <tr>
                        <th>organisation_photos</th>
                        <td><input type="file" class="form-control" value="{{ $business->organisation_photos }}" id="organisation_photos" name="inputs[{{ $index }}][organisation_photos]" ></td>
                    </tr>
                    <tr>
                        <th>
                        <button type="button" class="btn btn-danger removeBusForm float-right" data-index="{{ $index }}">Remove -</button>
                        </th>
                    </tr>          
                </table>
                <br><br>
                 @endforeach
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-success col-md-2">UPDATE</button>
                </div>
            </form>
       <br><br>
    @endif
            <form action="businessForm" method='post'>
        @csrf
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0">
                <tr>
                    <th>organisation_name</th>
                    <td><input type="text" class="form-control" id="organisation_name" name="inputs[0][organisation_name]" placeholder="Enter organisation_name"></td>
                </tr>
                <tr>
                    <th>organisation_address</th>
                    <td><input type="text" class="form-control" id="organisation_address" name="inputs[0][organisation_address]" placeholder="Enter organisation_address"></td>
                </tr>
                <tr>
                    <th>organisation_state</th>
                    <td><input type="text" class="form-control" id="organisation_state" name="inputs[0][organisation_state]" placeholder="Enter organisation_state"></td>
                </tr>
                <tr>
                    <th>organisation_city</th>
                    <td><input type="text" class="form-control" id="organisation_city" name="inputs[0][organisation_city]" placeholder="Enter organisation_city"></td>
                </tr>
                <tr>
                    <th>organisation_country</th>
                    <td><input type="text" class="form-control" id="organisation_country" name="inputs[0][organisation_country]" placeholder="Enter organisation_country"></td>
                </tr>
                <tr>
                    <th>organisation_phone</th>
                    <td><input type="text" class="form-control" id="organisation_phone" name="inputs[0][organisation_phone]" placeholder="Enter organisation_phone"></td>
                </tr>
                <tr>
                    <th>organisation_email</th>
                    <td><input type="text" class="form-control" id="organisation_email" name="inputs[0][organisation_email]" placeholder="Enter organisation_email"></td>
                </tr>
                <tr>
                    <th>organisation_photos</th>
                    <td><input type="file" class="form-control" id="organisation_photos" name="inputs[0][organisation_photos]" ></td>
                </tr>
            </table>
            <br>
            <table id="dynamic_business" class="table table-striped table-hover table-bordered mb-0">
                            
            </table>
            
        </div>
        <br>
        <div class="row">
        <button type="button" id="addMoreBusiness" class="btn btn-primary float-right col-md-2">Add more +</button>
        <div class="text-center">
        <button type="submit" class="btn btn-success col-md-2">Save</button>
        </div>
        </div>
        </form>
</div>

    <script>
         $(document).ready(function() {
            var formCount = 0;
            $('#addMoreBusiness').click(function() {
                formCount++;
                var newForm = `
                <br/>
				<table class="table table-striped table-hover table-bordered mb-0">
                <tr>
                    <th>organisation_name</th>
                    <td><input type="text" class="form-control" id="organisation_name" name="inputs[${formCount}][organisation_name]" placeholder="Enter organisation_name"></td>
                </tr>
                <tr>
                    <th>organisation_address</th>
                    <td><input type="text" class="form-control" id="organisation_address" name="inputs[${formCount}][organisation_address]" placeholder="Enter organisation_address"></td>
                </tr>
                <tr>
                    <th>organisation_state</th>
                    <td><input type="text" class="form-control" id="organisation_state" name="inputs[${formCount}][organisation_state]" placeholder="Enter organisation_state"></td>
                </tr>
                <tr>
                    <th>organisation_city</th>
                    <td><input type="text" class="form-control" id="organisation_city" name="inputs[${formCount}][organisation_city]" placeholder="Enter organisation_city"></td>
                </tr>
                <tr>
                    <th>organisation_country</th>
                    <td><input type="text" class="form-control" id="organisation_country" name="inputs[${formCount}][organisation_country]" placeholder="Enter organisation_country"></td>
                </tr>
                <tr>
                    <th>organisation_phone</th>
                    <td><input type="text" class="form-control" id="organisation_phone" name="inputs[${formCount}][organisation_phone]" placeholder="Enter organisation_phone"></td>
                </tr>
                <tr>
                    <th>organisation_email</th>
                    <td><input type="text" class="form-control" id="organisation_email" name="inputs[${formCount}][organisation_email]" placeholder="Enter organisation_email"></td>
                </tr>
                <tr>
                    <th>organisation_photos</th>
                    <td><input type="file" class="form-control" id="organisation_photos" name="inputs[${formCount}][organisation_photos]" ></td>
                </tr>
                    <tr>
                    <th>
                    <button type="button" class="btn btn-danger remove-business-table float-right">Remove -</button>
                    </th>
                    </tr>
                </table>
                `;
                $('#dynamic_business').append(newForm);
            });

            $(document).on('click', '.remove-business-table', function() {
                $(this).closest('table').remove();
            });


			$(document).on('click', '.removeBusForm', function() {
                var index = $(this).data('index');
                console.log(index);
                var formId = $('input[name="user_id[]"]').eq(index).val();
                console.log(formId);
                $.ajax({
                    url: '/deleteBusiness/' + formId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { formId: formId },
                    success: function(response) {
                        $('#business_table' + index).remove();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
			});
    </script>