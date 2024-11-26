<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $attendance->employee_id }}</p>
</div>

<!-- Check In Time Field -->
<div class="col-sm-12">
    {!! Form::label('check_in_time', 'Check In Time:') !!}
    <p>{{ $attendance->check_in_time }}</p>
</div>

<!-- Check Out Time Field -->
<div class="col-sm-12">
    {!! Form::label('check_out_time', 'Check Out Time:') !!}
    <p>{{ $attendance->check_out_time }}</p>
</div>

<!-- Hours Worked Field -->
<div class="col-sm-12">
    {!! Form::label('hours_worked', 'Hours Worked:') !!}
    <p>{{ $attendance->hours_worked }}</p>
</div>

