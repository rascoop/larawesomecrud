@extends('[[custom_master]]')

@section('content')

<!--<h2>[[model_uc]]</h2>-->
<div role="group">
    <a href="{{url('[[route_path]]/')}}" class="waves-effect waves-light btn" role="button">
        <i class="material-icons left">list</i>
        List of {{ ucfirst('[[model_plural]]') }}
    </a>
    <a href="{{url('[[route_path]]/create')}}" class="btn btn-primary btn-sm" role="button">
        <i class="material-icons left">list</i>
        Create {{ ucfirst('[[model_uc]]') }}
    </a>
    <a href="{{route('[[route_path]].destroy', [$[[model_singular]]->id])}}" class="btn btn-danger btn-sm"
       role="button"
       onclick="return doDelete({!! $[[model_singular]]->id !!})">
        <i class="material-icons left">delete</i>
        Delete {{ ucfirst('[[model_uc]]') }}
    </a>
</div>
<div class="clearfix">
</div>

<br/>
<div class="form-panel">

    <h3>Update [[model_uc]]</h3>


    {!! Form::model($[[model_singular]], ['url' => '[[route_path]]/' . $[[model_singular]]->id ]) !!}

    {{ csrf_field() }}

    <input type="hidden" name="_method" value="PATCH">

    @include('[[model_plural]]._form')

    <div class="row">
        <div class="col offset-s3 sm6">
            <button type="submit" class="btn">
                <i class="glyphicon glyphicon-ok"></i>
                Update
            </button>
        </div>
    </div>
    {!! Form::close() !!}


</div>

@endsection

@section('scripts')

<script type="text/javascript">
  function doDelete(id) {
    if (confirm('Do you really want to delete this record?')) {
      $.ajax({
        url: '{{ url(' / [[route_path]]') }}/' +id,
        type: 'DELETE',
        success: function () {
          window.location.reload();
        },
        error: function () {
          alert('Woops! Something went wrong. Internal error.');
        }
      });
    }
    return false;
  }
</script>

@endsection