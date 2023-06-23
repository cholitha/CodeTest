@extends('layout.usermaster')
@section('title','Available Products in Stock')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('body')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div id="errorAlert" class="alert alert-danger" style="display: none;"></div>
                    <div id="successAlert" class="alert alert-success" style="display: none;"></div>
                    <form>
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Customer Name :</label>
                    <input type="text" class="form-control" id="customer-name">
                    </div>
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Problem Description :</label>
                    <textarea class="form-control" id="problem-description"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Email :</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Phone Number :</label>
                    <input type="text" class="form-control" id="phone-number">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="send-message" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4">
            @foreach ($sellinglists as $product)
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <p class="card-text"><small class="text-muted">Seller :  {{ $product->name }}</small></p>
                        <img src="{{ asset('images') }}/{{ $product->item_image }}" style="max-width: 100px" class="card-img-top" alt="">
                        <p class="card-text"><small class="text-muted">Rs {{ $product->item_price }}</small></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->item_name }}</h5>
                        <p class="card-text">{{ $product->item_type }}</p>
                    </div>
                    <div class="card-footer">
                        @if (auth()->check())
                            <a href="" class="btn btn-primary">Add to Cart</a>
                        @else
                            <a href="/login" class="btn btn-primary">Add to Cart</a>
                        @endif
                        <button data-toggle="modal" data-supplier="{{ $product->name }}" data-id="{{ $product->id }}" data-name="{{ $product->item_name }}" id="askQuiz" data-target="#exampleModal" class="btn btn-info">Ask Quiz
                        </button>                          
                  </div>
                </div>
              </div>
            @endforeach
          </div>
    </div>
@endsection
@section('script')
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        $('#errorAlert').text('');
        $('#errorAlert').fadeOut();
        $('#successAlert').text('');
        $('#successAlert').fadeOut();
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        var id = $('#askQuiz').data('id');
        var name = $('#askQuiz').data('name');
        var supplier = $('#askQuiz').data('supplier');
        modal.find('.modal-title').text(name+' | '+supplier)
        modal.find('.modal-body input').val(recipient)
    });

    //
    $('#send-message').on('click',function(){
        var id = $('#askQuiz').data('id');
        var customer =$('#customer-name').val();
        var problem =$('#problem-description').val();
        var email =$('#email').val();
        var mobile =$('#phone-number').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        $.ajax({
            url: '/create-message',
            type: 'POST',
            data: {
                    id: id,
                    customer: customer,
                    problem: problem,
                    email: email,
                    mobile: mobile
                },
            success: function(response) {
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