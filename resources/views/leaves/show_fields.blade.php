<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $leaves->employee_id }}</p>
</div>

<!-- Leave Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('leave_type_id', 'Leave Type Id:') !!}
    <p>{{ $leaves->leave_type_id }}</p>
</div>

<!-- Department Id Field -->
<div class="col-sm-12">
    {!! Form::label('department_id', 'Department Id:') !!}
    <p>{{ $leaves->department_id }}</p>
</div>

<!-- Start Date Field -->
<div class="col-sm-12">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $leaves->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="col-sm-12">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $leaves->end_date }}</p>
</div>

<!-- Duration Field -->
<div class="col-sm-12">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{{ $leaves->duration }}</p>
</div>

<!-- Leave Status Field -->
<div class="col-sm-12">
    {!! Form::label('leave_status', 'Leave Status:') !!}
    <p>{{ $leaves->leave_status }}</p>
</div>

