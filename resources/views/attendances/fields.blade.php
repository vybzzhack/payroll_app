<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select Employee', 'required']) !!}
</div>

<!-- Check In Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_in_time', 'Check In Time:') !!}
    {!! Form::datetimeLocal('check_in_time', null, ['class' => 'form-control','id'=>'check_in_time']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#check_in_time').datepicker()
    </script>
@endpush

<!-- Check Out Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_out_time', 'Check Out Time:') !!}
    {!! Form::datetimeLocal('check_out_time', null, ['class' => 'form-control','id'=>'check_out_time']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#check_out_time').datepicker()
    </script>
@endpush

<!-- Hours Worked Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hours_worked', 'Hours Worked:') !!}
    {!! Form::number('hours_worked', null, ['class' => 'form-control']) !!}
</div>