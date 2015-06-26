@if(Session::has('flash_message_error'))
    <div class="container-fluid">
        <div class="row">
            <div class="bg-danger flash_message text-danger">
                {{Session::get('flash_message_error')}}
            </div>
        </div>
    </div>
@endif
@if(Session::has('flash_message_success'))
    <div class="container-fluid">
        <div class="row">
            <div class=" bg-success flash_message text-success">
                {{Session::get('flash_message_success')}}
            </div>
        </div>
    </div>
@endif