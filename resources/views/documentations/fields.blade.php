<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select employee', 'required']) !!}
</div>

<!-- Document Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_type', 'Document Type:') !!}
    {!! Form::text('document_type', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Document Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_name', 'Document Name:') !!}
    {!! Form::text('document_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- File Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file_path', 'Upload Document:') !!}
    {!! Form::file('file_path', ['class' => 'form-control']) !!}
    
</div>