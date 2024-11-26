<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select employee', 'required']) !!}
</div>

<!-- Leave Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_type_id', 'Leave Type Id:') !!}
    {!! Form::select('leave_type_id', $leavetypes, null, ['class' => 'form-control', 'placeholder' => 'Select leave type', 'required']) !!}
</div>

<!-- Department Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department Id:') !!}
    {!! Form::select('department_id',$departments, null, ['class' => 'form-control', 'placeholder' => 'Select department', 'required']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_date').datepicker()
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end_date').datepicker()
    </script>
@endpush

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration:') !!}
    {!! Form::number('duration', null, ['class' => 'form-control']) !!}
</div>

<!-- Leave Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_status', 'Leave Status:') !!}
    {!! Form::text('leave_status', null, ['class' => 'form-control', 'maxlength' => 1, 'maxlength' => 1]) !!}
</div>