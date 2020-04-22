@extends('layouts.app')
@section('stylesheets')
@endsection

@section('content')
    @include('admin.admin-layouts.header')
    <div class="container">
        <div class="row">
            {{public_path()}}
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            $('#category-create').on('submit', function (event) {
                event.preventDefault();

                let FormCat = $(this).attr("data-cat");

                if (FormCat == "sub") {
                    formUrl = '{{route("admin.store_sub_category")}}';
                } else {
                    formUrl = '{{route("admin.store_category")}}';
                }
                $.ajax({
                    url: formUrl,

                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function (wait) {
                        swal.fire({
                            text: 'Please wait, Your create is being processing...',
                            imageUrl: '{{asset('storage/main-content/Slow-Loading.gif')}}',
                            imageWidth: 200,
                            imageHeight: 200,
                            imageAlt: 'Custom image',
                            showConfirmButton:false,
                        })
                    },
                    success: function (response) {
                        if (!response) {
                            swal.fire('Cheer !', 'Category Created Successfully.', 'success');
                            $("#categoriesMap").load(location.href + " #categoriesMap");
                        } else {
                            swal.fire('Oops! Something is wrong !', response, 'error');
                        }
                    }
                });
            });
        });
    </script>
@endsection