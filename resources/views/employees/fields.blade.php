<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::number('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Department Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department Id:') !!}
    {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => 'Select department', 'required']) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Hire Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hire_date', 'Hire Date:') !!}
    {!! Form::date('hire_date', null, ['class' => 'form-control','id'=>'hire_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#hire_date').datepicker()
    </script>
@endpush

<!-- Employment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employment_type', 'Employment Type:') !!}
    {!! Form::text('employment_type', null, ['class' => 'form-control', 'maxlength' => 40, 'maxlength' => 40]) !!}
</div>

<!-- Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salary', 'Salary:') !!}
    {!! Form::number('salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Disability Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disability_status', 'Disability Status:') !!}
    {!! Form::text('disability_status', null, ['class' => 'form-control', 'maxlength' => 1, 'maxlength' => 1]) !!}
</div>

<!-- Job Basis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_basis', 'Job Basis:') !!}
    {!! Form::text('job_basis', null, ['class' => 'form-control', 'maxlength' => 20, 'maxlength' => 20]) !!}
</div>

<!-- Emergency Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emergency_contact', 'Emergency Contact:') !!}
    {!! Form::number('emergency_contact', null, ['class' => 'form-control']) !!}
</div>