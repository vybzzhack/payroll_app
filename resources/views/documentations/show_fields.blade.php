<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee:') !!}
    <p>{{ $documentations->employee_id }}</p>
</div>

<!-- Document Type Field -->
<div class="col-sm-12">
    {!! Form::label('document_type', 'Document Type:') !!}
    <p>{{ $documentations->document_type }}</p>
</div>

<!-- Document Name Field -->
<div class="col-sm-12">
    {!! Form::label('document_name', 'Document Name:') !!}
    <p>{{ $documentations->document_name }}</p>
</div>

<!-- File Path Field -->
<!-- <div class="col-sm-12">
    {!! Form::label('file_path', 'File:') !!}
    <p>{{ $documentations->file_path }}</p>
</div> -->

<div class="col-sm-12">
    {!! Form::label('file_path', 'File:') !!}
    <p>
        <a href="{{ asset($documentations->file_path) }}" target="_blank">
            View Document
        </a>
    </p>
</div>


