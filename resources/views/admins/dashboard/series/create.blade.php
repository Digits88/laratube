@extends('admins.dashboard.main')

@section('stylesheets')
    {{Html::style('css/fileinput.min.css')}}
@endsection

@section('content')
    {!! Form::open(['route' => 'series.store', 'method' => 'POST', 'files' => true]) !!}
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
    {{ Form::label('category_id', 'Category:') }}
    <select class="form-control" name="category_id" id="categories" onchange="pullASubCategory(this.value)">
        <option value="">Select category</option>
        @foreach($categories as $category)
            <option value='{{ $category->id }}'>{{ $category->categoryName }}</option>
        @endforeach
    </select>
    {{ Form::label('subcategory_id', 'Sub Category:') }}
    <select class="form-control" name="subcategory_id" id="subcategory" onchange="pullChildCategory(this.value)">
        <option value="">Select Sub category</option>
    </select>
    {{ Form::label('childcategory_id', 'Child Category:') }}
    <select class="form-control" name="childcategory_id" id="childcategory">
        <option value="">Select Child category</option>
    </select>
    <div class="radio radio-info radio-inline">
        <input type="radio" id="inlineRadio1" value="option1" name="isFeatured" checked>
        <label for="inlineRadio1"> Featured </label>
    </div>
    <div class="radio radio-inline">
        <input type="radio" id="inlineRadio2" value="option2" name="isFeatured">
        <label for="inlineRadio2"> Not Featured </label>
    </div>

    {{ Form::submit('Create Series', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
    {!! Form::close() !!}
@endsection

@section('scripts')
    {{Html::script('js/fileinput.min.js')}}
    <script>
        $("#input-1").fileinput({
            showUpload: false,
            allowedFileTypes: ["video"]
        });
        function pullASubCategory(categoryId){
            if(categoryId)
            {
                //alert(categoryId);
                $.getJSON("/admin/categories/sub/" + categoryId, function (data) {
                    var subcat = $('#subcategory').find("option:not(:first)").remove();
                    //console.log(data);
                    $.each(data, function (key, value) {
                        $('#subcategory').append('<option value ="'+value.id+'">'+value.subcategoryName+'</option>');
                    });
                });
            }
        }

        function pullChildCategory(id) {
            if(id)
            {
                $.getJSON("/admin/categories/sub/sub/" + id, function (data) {
                    var subcat = $('#childcategory').find("option:not(:first)").remove();
                    //console.log(data);
                    $.each(data, function (key, value) {
                        $('#childcategory').append('<option value ="'+value.id+'">'+value.childcategoryName+'</option>');
                    });
                });
            }
        }
    </script>
@endsection