<form action="postFamily" method='post'>
    @csrf
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mb-0">
   
    <tr>
        <th>Name</th>
        <th>Gender</th>
    </tr>
    <tr>
        
        <td><input type="text" name="inputs[0][name]" placeholder="enter your name" class="form-control"></td>
        <td><input type="text" name="inputs[0][gender]" placeholder="enter your gender" class="form-control"></td>
    </tr>

    </table>
</div>
<br>
<button type="submit">Save</button>
</form>