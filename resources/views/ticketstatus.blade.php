@extends('layout.usermaster')
@section('title','Available Products in Stock')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('body')
<div class="contrainer">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">Status</div>
                <div class="card-body">
                    <div id="errorAlert" class="alert alert-danger" style="display: none;"></div>
                    <div id="successAlert" class="alert alert-info" style="display: none;"></div>
                    <div class="form-group">
                        <label for="product_price">Referance Number</label>
                        <input type="text" class="form-control" id="ref_number">
                    </div>
                    <button id="search" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#search').on('click',function(){
        var number =$('#ref_number').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        $.ajax({
            url: '/ticketstatus',
            type: 'POST',
            data: {
                number: number
                },
            success: function(response) {
                console.log(response);
                // Handle the success response
                displayAlert(response.success,'successAlert');
            },
            error: function(xhr, status, error) {
                var errorMessage='';
                if (xhr.status === 422){
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(field, error) {
                        errorMessage+=error+' | ';
                    });
                    displayAlert(errorMessage,'errorAlert');
                }
            }
        });
    });

    function displayAlert(alertMessage,type) {
        $('#'+type).text(alertMessage);
        $('#'+type).fadeIn();
    }
</script>
@endsection